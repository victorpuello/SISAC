<?php

namespace ATS\Http\Controllers;


use ATS\Model\Asignacion;
use ATS\Model\Docente;
use ATS\Model\Estudiante;
use ATS\Model\Indicador;
use ATS\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (currentPerfil()){
            case 'docente':
                $docente = Auth::user()->docente;
                $docente->load(['asignaciones.grupo.estudiantes','indicadores']);
                $asignaciones = count($docente->asignaciones);
                $indicadores = count($docente->indicadores);
                $Nestudiantes = 0;
                foreach ($docente->asignaciones as $asignacion){
                    $Nestudiantes += count($asignacion->grupo->estudiantes);
                }
                return view('docente.home',compact('indicadores','asignaciones','Nestudiantes'));
            break;
            case 'admin':
                $Nestudiantes = Estudiante::all()->count();
                $Ndocentes = Docente::all()->count();
                $Nusers = User::all()->count();
                $Nlogros = Indicador::all()->count();
                return view('admin.home',compact('Nestudiantes','Ndocentes','Nusers','Nlogros'));
            break;
            case 'secretaria':
                $Nestudiantes = Estudiante::all()->count();
                $Ndocentes = Docente::all()->count();
                $Nusers = User::all()->count();
                $Nlogros = Indicador::all()->count();
                return view('secretaria.home',compact('Nestudiantes','Ndocentes','Nusers','Nlogros'));
            break;
            default:
                break;
        }
    }
}
