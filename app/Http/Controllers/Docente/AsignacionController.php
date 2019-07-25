<?php

namespace ATS\Http\Controllers\Docente;

use Illuminate\Support\Facades\Auth;
use ATS\Model\{Asignacion,Asignatura,Docente,Grupo};
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\createAsignacionRequest;
use ATS\Http\Requests\UpdateAsignacionRequest;

class AsignacionController extends Controller
{


    public function index()
    {
       $asignaciones = Auth::user()->docente->asignaciones;
       $asignaciones->load(['asignatura','grupo.grado','docente']);
        return view('docente.asignaciones.index',compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAsignacionRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacion $asignacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ATS\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsignacionRequest $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
