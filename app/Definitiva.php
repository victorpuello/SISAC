<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Definitiva extends Model
{
    protected $fillable = [
        'score','estudiante_id','periodo_id','asignatura_id'
    ];
    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }

    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }


}
