<?php

namespace ATS\Http\Controllers\Docente;

use ATS\Http\Requests\UpdateObservacionRequest;
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;
use ATS\Model\Observacion;
class ObservacionController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\Observacion  $observacion
     * @return \Illuminate\Http\Response
     */
    public function show(Observacion $observacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Observacion  $observacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Observacion $observacion)
    {
        return view('docente.observaciones.ajax.edit',compact('observacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ATS\Observacion  $observacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateObservacionRequest $request, Observacion $observacion)
    {
        $observacion->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Observacion  $observacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observacion $observacion)
    {
        //
    }
}
