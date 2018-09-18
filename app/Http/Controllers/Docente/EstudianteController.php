<?php

namespace ATS\Http\Controllers\Docente;

use ATS\Departamento;
use ATS\Estudiante;
use Illuminate\Http\Request;
use ATS\Http\Requests\CreateEstudianteRequest;
use ATS\Http\Requests\UpdateDocenteRequest;
use ATS\Http\Requests\UpdateEstudianteRequest;
use ATS\Municipio;
use ATS\Grupo;
use ATS\Http\Controllers\Controller;

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
     * @param  \ATS\Estudiante  $estudiante
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
