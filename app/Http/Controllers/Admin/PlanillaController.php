<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Anio;
use ATS\Asignacion;
use ATS\Docente;
use ATS\Http\Controllers\Controller;
use ATS\Periodo;
use Illuminate\Http\Request;

class PlanillaController extends Controller
{
   public function index(){

   }
   public function filtro(Request $request){

   }
   public function getFiltro(){
        $docentes = Docente::pluck('name','id');
        $anios = Anio::pluck('name','id');
        return view('admin.planillas.ajax.filtro',compact('docentes','anios'));
   }

}
