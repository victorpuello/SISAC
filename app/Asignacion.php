<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $fillable = [
        'horas','docente_id','salon_id','asignatura_id'
    ];
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    public function salon(){
        return $this->belongsTo(Salon::class);
    }
}
