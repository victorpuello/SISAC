<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Jornada
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Grupo[] $grupo
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Jornada whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Jornada whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Jornada whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Jornada whereUpdatedAt($value)
 */
class Jornada extends Model
{
    protected $fillable = [
        'name'
    ];
    public function grupo(){
        return $this->hasMany(Grupo::class);
    }
}
