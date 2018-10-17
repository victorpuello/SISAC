<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Definitiva
 *
 * @property-read \ATS\Asignatura $asignatura
 * @property-read \ATS\Estudiante $estudiante
 * @property-read \ATS\Periodo $periodo
 * @mixin \Eloquent
 * @property int $id
 * @property float $score
 * @property string $indicador
 * @property int $estudiante_id
 * @property int $asignatura_id
 * @property int $periodo_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Definitiva whereAsignaturaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Definitiva whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Definitiva whereEstudianteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Definitiva whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Definitiva whereIndicador($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Definitiva wherePeriodoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Definitiva whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Definitiva whereUpdatedAt($value)
 */
class Definitiva extends Model
{
    protected $fillable = [
        'score','indicador','estudiante_id','periodo_id','asignatura_id'
    ];
    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }

    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }


}
