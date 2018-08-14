<?php

namespace Ngsoft\Http\Controllers\Docente;

use Ngsoft\Acudiente;
use Illuminate\Http\Request;
use Ngsoft\Estudiante;
use Ngsoft\Http\Controllers\Controller;
use Ngsoft\Http\Requests\CreateAcudienteRequest;
use Ngsoft\Http\Requests\UpdateAcudienteRequest;
use Ngsoft\Municipio;

class AcudienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * @param Estudiante $estudiante
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Estudiante $estudiante)
    {
        return view('docente.acudientes.create',compact('estudiante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAcudienteRequest $request)
    {
        $acudiente = new Acudiente($request->all());
        $acudiente->save();
        return redirect()->action('Docente\DireccionController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function show(Acudiente $acudiente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ngsoft\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function edit(Acudiente $acudiente)
    {
        $estudiante = null;
        return view('docente.acudientes.edit',compact('acudiente','estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcudienteRequest $request, Acudiente $acudiente)
    {
        $acudiente->fill($request->all());
        $acudiente->save();
        return redirect()->action('Docente\DireccionController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acudiente $acudiente)
    {
        //
    }
}
