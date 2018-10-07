<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Asignacion
 *
 * @property-read \ATS\Asignatura $asignatura
 * @property-read \ATS\Docente $docente
 * @property-read mixed $direccion
 * @property-read \ATS\Grupo $grupo
 * @mixin \Eloquent
 * @property int $id
 * @property int $horas
 * @property int $director
 * @property int $active
 * @property int $docente_id
 * @property int $grupo_id
 * @property int $asignatura_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignacion whereAsignaturaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignacion whereDirector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignacion whereDocenteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignacion whereGrupoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignacion whereHoras($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignacion whereUpdatedAt($value)
 * @property int $anio_id
 * @property-read \ATS\Anio $anio
 * @property-read mixed $estado
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Planilla[] $planillas
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignacion whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Asignacion whereAnioId($value)
 */
class Asignacion extends Model
{
    protected $fillable = [
        'horas','docente_id','grupo_id','asignatura_id','director','active','anio_id'
    ];
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
    public function docente(){
        return $this->belongsTo(Docente::class);
    }
    public function grupo(){
        return $this->belongsTo(Grupo::class);
    }
    public function anio(){
        return $this->belongsTo(Anio::class);
    }
    public function planillas(){
        return $this->hasMany(Planilla::class);
    }

    public function getDireccionAttribute(){
        if ($this->director === 0){
            return 'No';
        }
        return 'Si';
    }
    public function getEstadoAttribute(){
        if ($this->active === 0){
            return 'Inactivo';
        }
        return 'Activo';
    }


}
