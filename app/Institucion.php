<?php

namespace Ngsoft;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Institucion extends Model
{
    protected $fillable = [
        'name','siglas','dane','nit','path','address','phone','email','rector','idrector','resolucion','slogan',
    ];
    public function setPathAttribute($path)
    {
        if (!empty($path)) {
            $image = \Image::make(Input::file('path'))->resize(100,100)->encode('png',100);
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
            \Storage::disk('public')->put($name,$image);
        }
    }
}
