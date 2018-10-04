<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Anio;
use ATS\Asignacion;
use ATS\Docente;
use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\FiltroRequest;

class PlanillaController extends Controller
{
   public function index(){

   }
   public function filtro(FiltroRequest $request){
       $asignaciones = Asignacion::where('docente_id','=',$request->docente_id)
                                    ->where('active','=',1)
                                    ->where('anio_id','=',$request->anio)
                                    ->with(['docente','grupo.grado','asignatura'])
                                    ->get();
       return view('admin.planillas.index',compact('asignaciones'));
   }
   public function getFiltro(){
        $docentes = Docente::has('asignaciones')->pluck('name','id');
        $anios = Anio::pluck('name','id');
        return view('admin.planillas.ajax.filtro',compact('docentes','anios'));
   }

}
