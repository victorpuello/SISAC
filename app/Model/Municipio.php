<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * ATS\Municipio
 *
 * @property-read \ATS\Departamento $departamento
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $departamento_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Municipio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Municipio whereDepartamentoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Municipio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Municipio whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Municipio whereUpdatedAt($value)
 */
class Municipio extends Model
{
    protected $fillable = [
        'name','departamento_id',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public static function municipios ($id){
        return Municipio::where('departamento_id','=',$id)->get();
    }
}
