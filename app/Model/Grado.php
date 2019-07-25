<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Grado
 *
 * @property-read mixed $ful_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\ATS\Grupo[] $grupos
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $numero
 * @property string $nivel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grado whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grado whereNivel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grado whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Grado whereUpdatedAt($value)
 */
class Grado extends Model
{
    protected $fillable = ['id','name','numero','nivel'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupos(){
        return $this->hasMany(Grupo::class);
    }
    public function getFulNameAttribute(){
        return $this->attributes['category'].' °';
    }
}
