<?php

namespace ATS\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * ATS\Docente
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Asignacion[] $asignaciones
 * @property-read mixed $is_director
 * @property-read mixed $salon_director
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Indicador[] $indicadores
 * @property-read \ATS\User $user
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string|null $typeid
 * @property int|null $numberid
 * @property string|null $fnac
 * @property string|null $gender
 * @property string|null $address
 * @property string|null $phone
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Docente whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Docente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Docente whereFnac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Docente whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Docente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Docente whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Docente whereNumberid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Docente wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Docente whereTypeid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Docente whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Docente whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Model\Planilla[] $planillas
 */
class Docente extends Model
{
    use SoftDeletes;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    protected $fillable = [
        'id','typeid','numberid','fnac','gender','address','phone','name','user_id'
    ];
    private $name;
    public function planillas(){
        return $this->hasManyThrough('ATS\Model\Planilla','ATS\Model\Asignacion');
    }

    public function asignaturas(){
        $asignaturas = DB::table('asignacions')->where('docente_id','=',$this->id)
                ->join('docentes','asignacions.docente_id','=','docentes.id')
                ->join('asignaturas','asignaturas.id','=','asignacions.asignatura_id')
                ->select('asignaturas.*')
                ->get();
        return array_pluck($asignaturas,'name','id');
    }

    public function indicadores(){
        return $this->hasMany(Indicador::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaciones(){
        return $this->hasMany(Asignacion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGrupoDirectorAttribute(){
        $asignacion = $this->asignaciones->where('director','=',1)->first();
        return $asignacion->grupo;
    }

    public function getIsDirectorAttribute(){
        $asignacion = DB::table('asignacions')->where('docente_id','=',$this->id);
        $asg = $asignacion->where('director','=', 1)->count();
        if ($asg > 0){
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getNameAsignaturasAttibute(){
        $asignaturas = $this->asignaturas;
        $this->name ='';
        foreach ($asignaturas as $asignatura){
            $this->name .= $asignatura->name.' - ';
        }
        $this->name = substr ($this->name, 0, -2);
        if (empty($this->name)) {
            return 'No tiene asignaturas vinculadas';
        }

        return $this->name;
    }

    public function getAsignaturasVinculadasAtribute(){
        $asignaturas = $this->asignaturas();
        foreach ($asignaturas as $key => $value){
            $asignaturas[$key]->name = $value->name;
        }
        return $asignaturas;
    }

}
