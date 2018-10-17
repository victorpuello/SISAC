<?php

namespace ATS\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

/**
 * ATS\Institucion
 *
 * @property-write mixed $path
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $siglas
 * @property string $resolucion
 * @property string $dane
 * @property string $nit
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $rector
 * @property string $idrector
 * @property string $slogan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereDane($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereIdrector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereNit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereRector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereResolucion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereSiglas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereSlogan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Institucion whereUpdatedAt($value)
 */
class Institucion extends Model
{
    protected $fillable = [
        'name','siglas','dane','nit','path','address','phone','email','rector','idrector','resolucion','slogan',
    ];

    public function setPathAttribute($path)
    {
        if (is_null($path)){
            $this->attributes['path'] = "15escudo_100x100.png";
        }
        if (!empty($path)) {
            $image = \Image::make(Input::file('path'))->resize(100,100)->encode('png',100);
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
            \Storage::disk('public')->put($name,$image);
        }
    }
}
