<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\DB;

/**
 * ATS\Grupo
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Asignacion[] $asignaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Estudiante[] $estudiantes
 * @property-read mixed $asignaturas
 * @property-read mixed $director
 * @property-read mixed $docentes
 * @property-read mixed $name_aula
 * @property-read mixed $name_for_validation
 * @property-read \ATS\Grado $grado
 * @property-read \ATS\Jornada $jornada
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $modelo
 * @property int $grado_id
 * @property int $jornada_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grupo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grupo whereGradoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grupo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grupo whereJornadaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grupo whereModelo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grupo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grupo whereUpdatedAt($value)
 */
class Grupo extends Model
{
    protected $fillable = [
        'name', 'grado_id','modelo','jornada_id'
    ];
    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
    public function jornada()
    {
        return $this->belongsTo(Jornada::class);
    }
    public function estudiantes ()
    {
        return $this->hasMany(Estudiante::class);
    }
    public function asignaciones(){
        return $this->hasMany(Asignacion::class);
    }
    public function getNameAulaAttribute ()
    {
        return $this->grado->name.' - '.$this->name;
    }
    public function getNameForValidationAttribute ()
    {
        return $this->grade . '' . $this->name;
    }

    public function getAsignaturasAttribute(){
        $asignaturas = DB::table('asignacions')
            ->where('grupo_id','=',$this->id)
            ->join('asignaturas','asignacions.asignatura_id','=', 'asignaturas.id')
            ->select('asignaturas.*')
            ->get();
        return $asignaturas;
    }
    public function getDocentesAttribute(){
        $docentes = DB::table('asignacions')
            ->where('salon_id','=',$this->id)
            ->join('docentes','asignacions.docente_id','=', 'docentes.id')
            ->select('docentes.*')
            ->get();
        return $docentes;
    }
    public function getDirectorAttribute(){
        $asignacion = $this->asignaciones->where('director','=',1)->first();
        return $asignacion->docente->name ?? "Sin Asignar";
    }

}
