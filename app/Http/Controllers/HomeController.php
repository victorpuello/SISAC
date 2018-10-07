<?php

namespace ATS\Http\Controllers;


use ATS\Model\Asignacion;
use ATS\Model\Docente;
use ATS\Model\Estudiante;
use ATS\Model\Indicador;
use ATS\Model\User;
use Illuminate\Http\Request;


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

                $asignaciones = Asignacion::where('docente_id','=',\Auth::user()->docente->id)->with('salon')->get();
                $Nlogros = Indicador::where('docente_id','=',\Auth::user()->docente->id)->count();
                $Nasignaciones = $asignaciones->count();
                $Nestudiantes = 0;
                if (! \Auth::user()->docente->is_director){
                    foreach ($asignaciones as $asignacion){
                        $Nestudiantes += $asignacion->salon->estudiantes->count();
                    }
                }else{
                    $Nestudiantes = \Auth::user()->docente->salon_director->estudiantes->count();
                }
                return view('docente.home',compact('Nlogros','Nasignaciones','Nestudiantes'));
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
                return view('admin.home',compact('Nestudiantes','Ndocentes','Nusers','Nlogros'));
            break;
            default:
                break;
        }
    }
}
