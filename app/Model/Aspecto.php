<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

class Aspecto extends Model
{
    protected $fillable = ['category', 'escala','description'];

    public function estudiantes (){
        return $this->hasMany(Estudiante::class);
    }
}
