<?php

namespace ATS\Http\Controllers\Docente;

use ATS\Clases\CurrentAnio;
use ATS\Model\{Anotacion,Estudiante,Periodo};
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\CreateAnotacionRequest;
use ATS\Http\Requests\UpdateAnotacionRequest;


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
        return redirect()->route('docente.direccion.observador',$estudiante);
    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\Anotacion  $anotacion
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Anotacion  $anotacion
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
     * @param  \ATS\Anotacion  $anotacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnotacionRequest $request, $id)
    {
        $anotacion = Anotacion::findOrFail($id);
        $anotacion->fill($request->all());
        $anotacion->save();
        $estudiante = Estudiante::findOrFail($request->estudiante_id);
        return redirect()->route('docente.direccion.observador',$estudiante);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Anotacion  $anotacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anotacion = Anotacion::findOrFail($id);
        $estudiante = $anotacion->estudiante;
        $anotacion->delete();
        return redirect()->route('docente.direccion.observador',$estudiante);
    }

}
