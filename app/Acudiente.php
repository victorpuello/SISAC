<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
    protected $fillable = [
        'name','lastname','relationship','document','phone','email','address','estudiante_id',
    ];

     function estudiante(){
        return $this->belongsTo(Estudiante::class);
     }

}
