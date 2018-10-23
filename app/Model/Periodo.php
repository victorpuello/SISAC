<?php

namespace ATS\Model;


use Illuminate\Database\Eloquent\Model;


/**
 * ATS\Model\Periodo
 *
 * @property int $id
 * @property string $name
 * @property string $datestart
 * @property string|null $dateend
 * @property string|null $cierre
 * @property string $estado
 * @property int $anio_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \ATS\Model\Anio $anio
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Model\Indicador[] $indicadores
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Model\Planilla[] $planillas
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Periodo whereAnioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Periodo whereCierre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Periodo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Periodo whereDateend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Periodo whereDatestart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Periodo whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Periodo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Periodo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Periodo whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Model\Nota[] $notas
 */
class Periodo extends Model
{
    protected $fillable = [
        'name','datestart','dateend','cierre','estado','anio_id','isFinal'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anio(){
        return $this->belongsTo(Anio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function indicadores(){
        return $this->hasMany(Indicador::class);
    }

    public function notas(){
        return $this->hasMany(Nota::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planillas(){
        return $this->hasMany(Planilla::class);
    }


    public function getNameAttribute(){
        return ucwords($this->attributes['name']) ;
    }

    public function getIsAnioAttribute(){
        return ($this->attributes['isFinal']) ? 'Si' : 'No' ;
    }
}
