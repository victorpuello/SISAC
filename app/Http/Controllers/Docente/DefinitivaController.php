<?php

namespace Ngsoft\Http\Controllers\Docente;

use Ngsoft\Definitiva;
use Illuminate\Http\Request;
use Ngsoft\Estudiante;
use Ngsoft\Http\Controllers\Controller;
use Ngsoft\Periodo;

class DefinitivaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDefinitivas(Estudiante $estudiante)
    {
        $periodos = Periodo::all();
       return view('docente.direccion-de-grupo.ajax.notas',compact('estudiante','periodos'));
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
     * @param  \Ngsoft\Definitiva  $definitiva
     * @return \Illuminate\Http\Response
     */
    public function show(Definitiva $definitiva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ngsoft\Definitiva  $definitiva
     * @return \Illuminate\Http\Response
     */
    public function edit(Definitiva $definitiva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Definitiva  $definitiva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Definitiva $definitiva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Definitiva  $definitiva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Definitiva $definitiva)
    {
        //
    }
}
