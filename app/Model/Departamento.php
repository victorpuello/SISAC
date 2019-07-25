<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Departamento
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Municipio[] $municipios
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Departamento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Departamento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Departamento whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Departamento whereUpdatedAt($value)
 */
class Departamento extends Model
{
    protected $fillable = [
        'name',
    ];
    public function municipios (){
        return $this->hasMany(Municipio::class);
    }
}
