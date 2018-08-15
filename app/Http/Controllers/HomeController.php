<?php

namespace Ngsoft\Http\Controllers;

use Illuminate\Http\Request;
use Ngsoft\Docente;
use Ngsoft\Estudiante;
use Ngsoft\Logro;
use Ngsoft\User;

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
                return view('docente.home');
            break;
            case 'admin':
                $Nestudiantes = Estudiante::all()->count();
                $Ndocentes = Docente::all()->count();
                $Nusers = User::all()->count();
                $Nlogros = Logro::all()->count();
                return view('admin.home',compact('Nestudiantes','Ndocentes','Nusers','Nlogros'));
            break;
            default:
                break;
        }
    }
}
