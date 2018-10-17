<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Nota
 *
 * @property-read \ATS\Estudiante $estudiante
 * @property-read \ATS\Indicador $indicador
 * @mixin \Eloquent
 * @property int $id
 * @property float $score
 * @property int $estudiante_id
 * @property int $indicador_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Nota whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Nota whereEstudianteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Nota whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Nota whereIndicadorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Nota whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Nota whereUpdatedAt($value)
 * @property int $periodo_id
 * @property-read \ATS\Model\Periodo $periodo
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Nota wherePeriodoId($value)
 */
class Nota extends Model
{
    protected $fillable = [
        'score','estudiante_id','indicador_id','periodo_id',
    ];

    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }
    public function indicador(){
        return $this->belongsTo(Indicador::class);
    }
    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }

//    public  function getScoreAttribute(){
//        return intval($this->attributes['score']);
//    }
}
