<?php

namespace ATS\Http\Controllers\Docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ATS\Model\{Estudiante,Municipio};
use ATS\Http\Controllers\Controller;

class DireccionController extends Controller
{
    public function index(){
        $docente = Auth::user()->docente;
        $estudiantes = $docente->grupo_director->estudiantes->where('stade','activo');
        return view('docente.direccion-de-grupo.index',compact('estudiantes','fondos'));
    }
    public function getAcudiente(Estudiante $estudiante){
        return view('docente.direccion-de-grupo.ajax.acudiente',compact('estudiante'));
    }
    public function getMatricula(Estudiante $estudiante){
        $municipio = Municipio::findOrFail($estudiante->birthcity);
        return view('docente.direccion-de-grupo.ajax.matricula',compact('estudiante','municipio'));
    }
}
