<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Indicador
 *
 * @property-read \ATS\Asignatura $asignatura
 * @property-read \ATS\Docente $docente
 * @property-read string $categoria
 * @property-read string $indic
 * @property-read \ATS\Grado $grado
 * @property-read \ATS\Periodo $periodo
 * @mixin \Eloquent
 * @property int $id
 * @property string $code
 * @property int $grado_id
 * @property int $asignatura_id
 * @property int $periodo_id
 * @property int $docente_id
 * @property string $category
 * @property string $indicator
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Indicador whereAsignaturaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Indicador whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Indicador whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Indicador whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Indicador whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Indicador whereDocenteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Indicador whereGradoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Indicador whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Indicador whereIndicator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Indicador wherePeriodoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Indicador whereUpdatedAt($value)
 */
class Indicador extends Model
{
    protected $fillable = [
        'code','grado_id','asignatura_id','periodo_id','docente_id','category','indicator','description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grado(){
        return $this->belongsTo(Grado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    /**
     * @return string
     */
    public function getIndicAttribute(){
        if($this->attributes['indicator'] === 'basico'){
            return ucwords('básico');
        }
        return ucwords($this->attributes['indicator']);
    }

    /**
     * @return string
     */
    public function getCategoriaAttribute(){
        return ucwords($this->attributes['category']);
    }
}
