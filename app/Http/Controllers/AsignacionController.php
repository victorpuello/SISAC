<?php

namespace Ngsoft\Http\Controllers;

use Ngsoft\Asignacion;
use Illuminate\Http\Request;
use Ngsoft\Asignatura;
use Ngsoft\Docente;
use Ngsoft\Http\Requests\createAsignacionRequest;
use Ngsoft\Salon;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaciones = Asignacion::all();
        $docentes = Docente::orderBy('name','ASC')->pluck('name','id');
        $salones_todos = Salon::orderBy('name','ASC')->get();
        $asignaturas = Asignatura::orderBy('name','ASC')->pluck('name','id');
        $sal= collect();
        foreach ($salones_todos as $salon){
            $sal->push([
                'id'=>$salon->id,
                'nombre'=>$salon->full_name,
                'grado'=>$salon->grade,
            ]);
        }
        $salones = $sal->sortBy('grado')->pluck('nombre','id');
        return view('admin.asignaciones.index',compact('asignaciones','docentes','salones','asignaturas'));
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
        $asignacion = new Asignacion($request->all());
        $asignacion->save();
        return redirect()->route('asignaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ngsoft\Asignacion  $asignacion
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
     * @param  \Ngsoft\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignacion $asignacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignacion $asignacion)
    {
        //
    }
}
