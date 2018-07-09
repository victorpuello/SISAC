<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $fillable = [
        'name',
    ];
    public function docentes (){
        return $this->belongsToMany(Docente::class);
    }

    public function logros(){
        return $this->hasMany(Logro::class);
    }
}
