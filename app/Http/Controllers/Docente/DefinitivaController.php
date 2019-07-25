<?php

namespace ATS\Http\Controllers\Docente;

use ATS\Clases\CurrentAnio;
use ATS\Model\{Definitiva,Estudiante,Periodo};
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;

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
        $periodos = (new CurrentAnio())->periodos();
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
     * @param  \ATS\Definitiva  $definitiva
     * @return \Illuminate\Http\Response
     */
    public function show(Definitiva $definitiva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Definitiva  $definitiva
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
     * @param  \ATS\Definitiva  $definitiva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Definitiva $definitiva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Definitiva  $definitiva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Definitiva $definitiva)
    {
        //
    }
}
