<?php

namespace ATS;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\DB;

class Grupo extends Model
{
    protected $fillable = [
        'name', 'grado_id','modelo','jornada_id'
    ];
    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
    public function jornada()
    {
        return $this->belongsTo(Jornada::class);
    }
    public function getNameAulaAttribute ()
    {
        return $this->grado->name.' - '.$this->name;
    }

    public function getNameForValidationAttribute ()
    {
        return $this->grade . '' . $this->name;
    }

    public function estudiantes ()
    {
        return $this->hasMany(Estudiante::class);
    }
    public function asignaciones(){
        return $this->hasMany(Asignacion::class);
    }
    public function getAsignaturasAttribute(){
        $asignaturas = DB::table('asignacions')
            ->where('salon_id','=',$this->id)
            ->join('asignaturas','asignacions.asignatura_id','=', 'asignaturas.id')
            ->select('asignaturas.*')
            ->get();
        return $asignaturas;
    }
    public function getDocentesAttribute(){
        $docentes = DB::table('asignacions')
            ->where('salon_id','=',$this->id)
            ->join('docentes','asignacions.docente_id','=', 'docentes.id')
            ->select('docentes.*')
            ->get();
        return $docentes;
    }
    public function getDirectorAttribute(){
        $docentes = DB::table('asignacions')
            ->where('salon_id','=',$this->id)
            ->join('docentes','asignacions.docente_id','=', 'docentes.id')
            ->select('asignacions.director','docentes.name')
            ->get();
        $docente = $docentes->where('director','=', 1)->first();
        return $docente->name;
    }

}
