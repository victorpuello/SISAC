<?php

namespace ATS\Http\Controllers\Secretaria;

use ATS\Model\{Acudiente,Estudiante};
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\CreateAcudienteRequest;
use ATS\Http\Requests\UpdateAcudienteRequest;


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
        return view('secretaria.acudientes.create',compact('estudiante'));
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
        return redirect()->action('Secretaria\EstudianteController@show',$request->estudiante_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function show(Acudiente $acudiente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function edit(Acudiente $acudiente)
    {
        $estudiante = null;
        return view('secretaria.acudientes.edit',compact('acudiente','estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ATS\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcudienteRequest $request, Acudiente $acudiente)
    {
        $acudiente->fill($request->all());
        $acudiente->save();
        return redirect()->action('Secretaria\EstudianteController@show',$request->estudiante_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acudiente $acudiente)
    {
        //
    }
}
