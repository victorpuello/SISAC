<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = [
        'score','estudiante_id','logro_id',
    ];

    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }
    public function logro(){
        return $this->belongsTo(Logro::class);
    }

}
