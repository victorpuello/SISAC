<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $fillable = [
        'name','datestart','dateend',
    ];

    public function estudiantes(){
        return $this->belongsToMany(Estudiante::class);
    }

    public function logros(){
        return $this->hasMany(Logro::class);
    }

}
