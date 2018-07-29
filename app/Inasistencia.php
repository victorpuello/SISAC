<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Inasistencia extends Model
{
    protected $fillable = [
        'numero','estudiante_id','periodo_id','asignatura_id'
    ];

    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }
    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }
    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }



}
