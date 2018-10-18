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

                $asignaciones = 1;
                $Nlogros = 1;
                $Nasignaciones = 1;
                $Nestudiantes = 0;
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
