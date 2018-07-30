<?php

namespace Ngsoft\Http\Controllers;

use Illuminate\Http\Request;
use Ngsoft\Estudiante;
use Ngsoft\Institucion;
use Ngsoft\Periodo;
use Ngsoft\Salon;
use Ngsoft\Transformers\EstudianteTransformer;

class ReportesController extends Controller
{
    public function index(){
        return view('admin.reportes.index');
    }
    public function reporteAcademico (Periodo $periodo, Salon $aula){
        $institucion = Institucion::all()->first();
        $estudiantes = Estudiante::orderBy('lastname','ASC')->where('salon_id','=',$aula->id)->where('stade','=','activo')->get();

        //new EstudianteTransformer($aula->grade,$Idasignatura,$Iddocente,$Idperiodo)
        //dd($estudiantes);
        return view('admin.reportes.print.informeEstudiante',compact('estudiantes','institucion','salon','periodo'));
    }
}
