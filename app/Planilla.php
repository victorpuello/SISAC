<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    protected $fillable = [
        'grado','docente','asignatura','periodo','codigo','creada'
    ];
}
