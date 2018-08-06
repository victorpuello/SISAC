<?php

namespace Ngsoft\Http\Controllers\Docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ngsoft\Estudiante;
use Ngsoft\Http\Controllers\Controller;

class DireccionController extends Controller
{
    public function index(){
        $docente = Auth::user()->docente;
        $fondos = ['bg-primary','bg-secondary','bg-tertiary','bg-quaternary'];
        $estudiantes = Estudiante::where('salon_id','=',$docente->salon_director->id)->orderBy('lastname')->get();
        return view('docente.direccion-de-grupo.index',compact('estudiantes','fondos'));
    }
}
