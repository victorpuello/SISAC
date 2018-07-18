<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    protected $fillable = [
        'code','description','category','grade','asignatura_id','docente_id','periodo_id'
    ];

    public function asignatura()
    {
    	return $this->belongsTo(Asignatura::class);
    }
    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }

    public function estudiantes(){
        return $this->belongsToMany(Estudiante::class)->withPivot('score');
    }

}
