<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $fillable = [
        'name','datestart','dateend','cierre','estado',
    ];

    public function estudiantes(){
        return $this->belongsToMany(Estudiante::class);
    }

    public function logros(){
        return $this->hasMany(Logro::class);
    }

    public function getlogros(Asignacion $asignacion){
        return Logro::where('docente_id','=',$asignacion->docente->id)
            ->where('asignatura_id','=',$asignacion->asignatura->id)
            ->where('grade','=',$asignacion->salon->grade)
            ->where('periodo_id','=',$this->attributes['id'])->orderBy('category')->with('notas')->get();
    }


}
