<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Area
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Asignatura[] $asignaturas
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property float $porcentaje
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Area whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Area wherePorcentaje($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Area whereUpdatedAt($value)
 */
class Area extends Model
{
    protected $fillable = ['name','porcentaje'];
    public function asignaturas(){
        return $this->hasMany(Asignatura::class);
    }
}

