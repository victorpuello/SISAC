<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = [
        'score','estudiante_id','periodo_id','logro_id',
    ];

    function periodo(){
        return $this->belongsTo(Periodo::class);
    }

    function logro(){
        return $this->belongsTo(Logro::class);
    }

    function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }


}
