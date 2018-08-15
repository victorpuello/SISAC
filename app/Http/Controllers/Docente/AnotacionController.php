<?php

namespace Ngsoft\Http\Controllers\Docente;

use Ngsoft\Anotacion;
use Illuminate\Http\Request;
use Ngsoft\Estudiante;
use Ngsoft\Http\Controllers\Controller;
use Ngsoft\Http\Requests\CreateAnotacionRequest;
use Ngsoft\Http\Requests\UpdateAnotacionRequest;
use Ngsoft\Periodo;

class AnotacionController extends Controller
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
    public function store(CreateAnotacionRequest $request)
    {
        $estudiante = Estudiante::findOrFail($request->estudiante_id);
        if (! $request->has('path')){
            $request->merge(['path' => '']);
        }
        $anotacion = new Anotacion($request->all());
        $anotacion->save();
        return redirect()->route('docente.direccion.getobservador',$estudiante);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Anotacion  $anotacion
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ngsoft\Anotacion  $anotacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anotacion = Anotacion::findOrFail($id);
        $estudiante = $anotacion->estudiante;
        $periodos = Periodo::all();
        return view('docente.observador.ajax.edit',compact('anotacion','estudiante','periodos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Anotacion  $anotacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnotacionRequest $request, $id)
    {
        $anotacion = Anotacion::findOrFail($id);
        $anotacion->fill($request->all());
        $anotacion->save();
        $estudiante = Estudiante::findOrFail($request->estudiante_id);
        return redirect()->route('docente.direccion.getobservador',$estudiante);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Anotacion  $anotacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anotacion = Anotacion::findOrFail($id);
        $estudiante = $anotacion->estudiante;
        $anotacion->delete();
        return redirect()->route('docente.direccion.getobservador',$estudiante);
    }
    public function getObservador(Estudiante $estudiante)
    {
        $periodos = Periodo::all();
        return view('docente.observador.index', compact('estudiante','periodos'));
    }
}
