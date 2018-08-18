<?php

namespace Ngsoft;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Estudiante extends Model
{
    protected $fillable =[
        'name','lastname','typeid','identification','birthday','birthstate','birthcity','gender','address','EPS','phone','datein','dateout','path','stade','situation','salon_id',
    ];
    // Start Relationship of estudent
    protected $all_notas;
    public $_inasistencias;
    public function __construct (array $attributes = [])
    {
        parent::__construct($attributes);

    }

    public function salon()
    {
    	return $this->belongsTo(Salon::class);
    }
    public function acudiente(){
        return $this->hasOne(Acudiente::class);
    }
    public function notas(){
        return $this->hasMany(Nota::class);
    }
    public function definitivas(){
        return $this->hasMany(Definitiva::class);
    }
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
        if (!empty($path)) {
            $image = \Image::make(Input::file('path'))->resize(250,270)->encode('jpg',90);
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
           \Storage::disk('estudiantes')->put($name,$image);
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
    public function currentNotas($grade, $asignatura, $docente, $periodo){
        $this->all_notas = Nota::all();
        $logros = $this->logros
            ->where('asignatura_id','=',$asignatura)
            ->where('docente_id','=',$docente)
            ->where('periodo_id','=',$periodo)
            ->where('grade','=',$grade)->sortBy('category');
        $notas = collect();
        foreach ($logros as $logro){
            $q = $this->all_notas->where('logro_id','=',$logro->id)
                ->where('estudiante_id','=',$this->id)->first();
            $notas->push($q);
        }
        return $notas;
    }

    public function NotasInforme($asignatura, $periodo){
        $this->all_notas = $this->notas;
        $logros = $this->logros
            ->where('asignatura_id','=',$asignatura)
            ->where('periodo_id','=',$periodo)->sortBy('category');
        $notas = collect();
        foreach ($logros as $logro){
            $q = $this->all_notas->where('logro_id','=',$logro->id)
                ->where('estudiante_id','=',$this->id)->first();
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
        $definitiva->fill([
            'score' => $score
        ]);
        $definitiva->save();
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
