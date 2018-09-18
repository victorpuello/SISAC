<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $fillable = [
        'horas','docente_id','salon_id','asignatura_id','director',
    ];
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    public function salon(){
        return $this->belongsTo(Grupo::class);
    }

    public function getDireccionAttribute(){
        if ($this->director === 0){
            return 'No';
        }
        return 'Si';
    }


}
