<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $fillable = [
        'name','datestart','dateend',
    ];
    public function estudiantes(){
        return $this->belongsToMany(Periodo::class)->withPivot('inasistencias');
    }

    public function anotacion(){
       return $this->belongsTo(Anotacion::class);
    }

    public function  notas(){
        return $this->hasMany(Nota::class);
    }
}
