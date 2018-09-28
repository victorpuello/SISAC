<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name','porcentaje'];
    public function asignaturas(){
        return $this->hasMany(Asignatura::class);
    }
}
