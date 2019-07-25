<?php

namespace ATS\Model;


use Illuminate\Database\Eloquent\Model;


/**
 * ATS\Model\Anio
 *
 * @property int $id
 * @property string $name
 * @property string $start
 * @property string $end
 * @property int $activo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Model\Asignacion[] $asignaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Model\Periodo[] $periodos
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Anio whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Anio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Anio whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Anio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Anio whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Anio whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\Anio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Anio extends Model
{
    protected $fillable = ['name','start','end','activo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function periodos(){
        return $this->hasMany(Periodo::class);
    }
    public function asignaciones(){
        return $this->hasMany(Asignacion::class);
    }
}
