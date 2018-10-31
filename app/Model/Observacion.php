<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $fillable = ['aspecto_id','estudiante_id','periodo_id','valoracion'];

    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }
    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }
    public function aspecto(){
        return $this->belongsTo(Aspecto::class);
    }
}
