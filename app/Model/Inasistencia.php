<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Inasistencia
 *
 * @property-read \ATS\Asignatura $asignatura
 * @property-read \ATS\Estudiante $estudiante
 * @property-read \ATS\Periodo $periodo
 * @mixin \Eloquent
 * @property int $id
 * @property int $numero
 * @property int $estudiante_id
 * @property int $periodo_id
 * @property int $asignatura_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Inasistencia whereAsignaturaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Inasistencia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Inasistencia whereEstudianteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Inasistencia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Inasistencia whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Inasistencia wherePeriodoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Inasistencia whereUpdatedAt($value)
 */
class Inasistencia extends Model
{
    protected $fillable = [
        'numero','estudiante_id','periodo_id','asignatura_id'
    ];

    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }
    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }
    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }



}
