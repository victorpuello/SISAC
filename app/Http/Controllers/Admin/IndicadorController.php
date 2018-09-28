<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Asignatura;
use ATS\Docente;
use ATS\Grado;
use ATS\Http\Controllers\Controller;
use ATS\Indicador;
use ATS\Periodo;
use ATS\Transformers\IndicadorTransformer;
use Illuminate\Http\Request;

class IndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $indicadores = Indicador::with(['grado','asignatura','periodo','docente']);
        if ($request->ajax()){
            return datatables()->eloquent($indicadores)->setTransformer(new IndicadorTransformer())->smart(true)->toJson();
        }
        return view('admin.indicadores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados = Grado::pluck('name','id');
        $asignaturas = Asignatura::pluck('name','id');
        $periodos = Periodo::pluck('name','id');
        $docentes = Docente::pluck('name','id');
        return view('admin.indicadores.ajax.create',compact('grados','asignaturas','periodos','docentes'));
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
     * @param  \ATS\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function show(Indicador $indicador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicador $indicador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ATS\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indicador $indicador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indicador $indicador)
    {
        //
    }
}
