<?php

namespace Ngsoft\Http\Controllers\Docente;

use Ngsoft\Departamento;
use Ngsoft\Estudiante;
use Illuminate\Http\Request;
use Ngsoft\Http\Requests\CreateEstudianteRequest;
use Ngsoft\Http\Requests\UpdateDocenteRequest;
use Ngsoft\Http\Requests\UpdateEstudianteRequest;
use Ngsoft\Municipio;
use Ngsoft\Grupo;
use Ngsoft\Http\Controllers\Controller;

class EstudianteController extends Controller
{
    /**
     * @param Estudiante $estudiante
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Estudiante $estudiante)
    {
        $departamentos = Departamento::pluck('name','id');
        $grado = $estudiante->grade;
        return view('docente.estudiantes.edit',compact('estudiante','grado','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstudianteRequest $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->fill($request->all());
        $estudiante->save();
        return redirect()->route('docente.direccion.index');
    }

}
