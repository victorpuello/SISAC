<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Anio
 *
 * @property int $id
 * @property string $name
 * @property string $start
 * @property string $end
 * @property int $activo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Asignacion[] $asignaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Periodo[] $periodos
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anio whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anio whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anio whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anio whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Anio whereUpdatedAt($value)
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
