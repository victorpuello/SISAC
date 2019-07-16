<?php

namespace ATS\Model;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = ['grado_id','asignatura_id','category','indicator','pack','description'];

    public function grado(){
        return $this->belongsTo(Grado::class);
    }
    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }
}
