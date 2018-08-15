<?php

namespace Ngsoft;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\DB;

class Salon extends Model
{
    protected $fillable = [
        'name', 'grade',
    ];
    private $nombres = ['0' => 'Pre-Escolar', '1' => 'Primero', '2' => 'Segundo', '3' => 'Tercero', '4' => 'Cuarto', '5' => 'Quinto', '6' => 'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno', '10' => 'Decimo', '11' => 'Once'];


    public function getNameAulaAttribute ()
    {
        return 'Grupo: ' . $this->nombres[$this->grade] . ' - ' . $this->name;
    }

    public function getNameForValidationAttribute ()
    {
        return $this->grade . '' . $this->name;
    }

    public function getFullNameAttribute ()
    {
        return $this->nombres[$this->grade] . ' - ' . $this->name;
    }
    public function getNameGradeAttribute ()
    {
        return $this->nombres[$this->grade];
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
