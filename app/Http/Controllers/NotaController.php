<?php

namespace Ngsoft\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ngsoft\Asignatura;
use Ngsoft\Estudiante;
use Ngsoft\Logro;
use Illuminate\Http\Request;
use Ngsoft\Periodo;
use Ngsoft\Salon;

class NotaController extends Controller
{
    private $fondos =  ['primary','secondary','tertiary','quaternary'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $fondos = $this->fondos;
        switch (Auth::user()->type){
            case 'docente':
                $docente = Auth::user()->docente;
                $salones = $docente->salones;
                break;
            default:
                $salones = Salon::select('name','id','grade')->get();
                break;
        }
        return view('admin.notas.index',compact('salones','fondos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiantes = DB::table('estudiantes')
            ->where('salon_id','=',$id)
            ->orderBy('lastname','asc')
            ->get();
        return view('admin.notas.show',compact('estudiantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ngsoft\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }


}
