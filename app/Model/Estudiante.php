<?php

namespace ATS\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

/**
 * ATS\Estudiante
 *
 * @property-read \ATS\Acudiente $acudiente
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Anotacion[] $anotaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Definitiva[] $definitivas
 * @property-read mixed $active
 * @property-read mixed $apellido_name
 * @property-read mixed $estudiante_inasistencias
 * @property-read mixed $full_name
 * @property-read mixed $logros
 * @property-read \ATS\Grupo $grupo
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Inasistencia[] $inasistencias
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Nota[] $notas
 * @property-write mixed $category
 * @property-write mixed $path
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $typeid
 * @property int $identification
 * @property string $birthday
 * @property string $birthstate
 * @property string $birthcity
 * @property string $gender
 * @property string $address
 * @property string $EPS
 * @property string $phone
 * @property string $datein
 * @property string|null $dateout
 * @property string $stade
 * @property string $situation
 * @property int $grupo_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereBirthcity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereBirthstate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereDatein($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereDateout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereEPS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereGrupoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereIdentification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereSituation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereStade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereTypeid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Estudiante whereUpdatedAt($value)
 */
class Estudiante extends Model
{
    protected $fillable =[
        'name','lastname','typeid','identification','birthday','birthstate','birthcity','gender','address','EPS','phone','datein','dateout','path','stade','situation','grupo_id',
    ];
    // Start Relationship of estudent
    protected $all_notas;
    public $_inasistencias;

    public function grupo()
    {
    	return $this->belongsTo(Grupo::class);
    }
    public function acudiente(){
        return $this->hasOne(Acudiente::class);
    }
    public function notas(){
        return $this->hasMany(Nota::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function definitivas(){
        return $this->hasMany(Definitiva::class);
    }

    /**
     * @param $idPeriodo
     * @param $idAsignatura
     * @return mixed
     */
    public  function getDefinitivaExist($idPeriodo, $idAsignatura){
        return $this->definitivas->where('periodo_id','=',$idPeriodo)
            ->where('asignatura_id','=',$idAsignatura);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inasistencias(){
        return $this->hasMany(Inasistencia::class);
    }

    public function anotaciones(){
            return $this->hasMany(Anotacion::class);
    }
    // Start Accesors of Student
    public function getFullNameAttribute(){
        return $this->name.' '.$this->lastname;
    }
    public function getApellidoNameAttribute(){
        $name = $this->lastname.' '.$this->name;
        if (strlen($name) > 29){
            return substr($name,0,26).'...';
        }
        return $this->lastname.' '.$this->name;
    }
    public function getAnotacionPeriodo($periodo){
        return $this->anotaciones->where('periodo_id','=',$periodo->id);
    }

    public function getActiveAttribute ()
    {
        if ($this->stade ==='activo'){
            return true;
        }
        return false;
    }
    public function getLogrosAttribute(){
        $logros = DB::table('notas')->where('estudiante_id','=',$this->id)
            ->join('estudiantes','estudiantes.id','=','notas.estudiante_id')
            ->join('logros','logros.id','=','notas.logro_id')
            ->select('notas.*','notas.id as nota_id','logros.*','logros.id as original_logro_id')
            ->get();
        return $logros;
    }
    public function getEstudianteInasistenciasAttribute(){
        $inasistencias = $this->inasistencias->where('estudiante_id','=',$this->id)
            ->get();
        return $inasistencias;
    }
    // Start Mutators student
    //
    public function setPathAttribute($path)
    {
        if (! isset($path)){
            $this->attributes['path'] = "no-user-image.png";
        }
        if (is_null($path)){
            $this->attributes['path'] = "no-user-image.png";
        }
        if (!empty($path)) {
            $image = \Image::make(Input::file('path'))->resize(250,270)->encode('jpg',90);
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
           \Storage::disk('estudiantes')->put($name,$image);
        }
    }
    public function setCategoryAttribute($category = "")
    {
        if (!empty($category)) {
            unset($category);
        }
    }

    // Start Fuctions

    /**
     * @param $grade
     * @param $asignatura
     * @param $docente
     * @param $periodo
     * @return \Illuminate\Support\Collection
     */

    public function NotasInforme($asignatura, $periodo){
        $this->all_notas = $this->notas;
        $logros = $this->logros
            ->where('asignatura_id','=',$asignatura)
            ->where('periodo_id','=',$periodo)->sortBy('category');
        $notas = collect();
        foreach ($logros as $logro){
            $q = $this->all_notas->where('logro_id','=',$logro->id)
                ->where('estudiante_id','=',$this->id)->first();
            switch ($logro->category){
                case 'cognitivo':
                    $q->setAttribute('porcentaje','60%');
                    break;
                case 'procedimental':
                    $q->setAttribute('porcentaje','30%');
                    break;
                case 'actitudinal':
                    $q->setAttribute('porcentaje','10%');
                    break;
                default:
                    break;
            }
            $notas->push($q);
        }
        return $notas;
    }
    public function NotasDefinitivas($periodo){
        //dd( $this->definitivas->where('periodo_id','=',$periodo));
        return $this->definitivas->where('periodo_id','=',$periodo)->sortBy('asignatura_id');
    }

    /**
     * @param $category
     * @param $grade
     * @param $asignatura
     * @param $docente
     * @param $periodo
     * @return mixed
     */
    public function currentNotaScore($category, $grade, $asignatura, $docente, $periodo){
        $nota = $this->logros
            ->where('category','=',$category)
            ->where('asignatura_id','=',$asignatura)
            ->where('docente_id','=',$docente)
            ->where('periodo_id','=',$periodo)
            ->where('grade','=',$grade)->first();
        return $nota->score;
    }

    /**
     * @param $asignatura
     * @param $periodo
     * @return mixed
     */
    public function currentInasistencias ($asignatura, $periodo)
    {
        $inasistenscias = $this->inasistencias
            ->where('asignatura_id','=',$asignatura)
            ->where('periodo_id','=',$periodo);
        return collect($inasistenscias);
    }

    public  function  editDef($score,$asignatura,$periodo){
        $definitiva = $this->definitivas
            ->where('asignatura_id','=',$asignatura)
            ->where('periodo_id','=',$periodo)->first();
        $definitiva->update([
            'score' => $score
        ]);
    }
    public  function getDef ($asignatura,$periodo){
        $def = $this->definitivas->where('asignatura_id','=',$asignatura)->where('periodo_id','=',$periodo)->first();
        if ($def){
            return $def->attributes["score"];
        }
        return 1;
    }
    public  function getDefInforme ($asignatura,$periodo){
        $def = $this->definitivas->where('asignatura_id','=',$asignatura)->where('periodo_id','=',$periodo)->first();
        if ($def){
            return $def->attributes["score"];
        }
        return "";
    }
    public  function getDefPeriodo ($periodo){
        return $this->definitivas->where('periodo_id','=',$periodo);
    }

}
