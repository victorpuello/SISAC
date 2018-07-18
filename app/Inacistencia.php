<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Inacistencia extends Model
{
    protected $fillable = [
        'estudiante','periodo','asignatura','numero',
    ];
}
