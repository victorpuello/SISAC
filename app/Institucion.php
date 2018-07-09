<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $fillable = [
        'name','siglas','dane','address','phone','email','rector','idrector','resolucion','slogan',
    ];
    
}
