<?php

namespace ATS\Http\Controllers\Docente;

use ATS\Model\{Departamento,Estudiante,Municipio,Grupo};
use Illuminate\Http\Request;
use ATS\Http\Requests\UpdateEstudianteRequest;
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
        $municipios = Municipio::pluck('name','id');
        $grupos = $this->getGrupo();
        return view('docente.estudiantes.edit',compact('estudiante','grupos','municipios','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ATS\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstudianteRequest $request, Estudiante $estudiante)
    {
        $estudiante->update($request->all());
        return redirect()->route('docente.direccion.index');
    }
    public function getGrupo (): array
    {
        $data = Grupo::with('grado')->get();
        $grupos = [];
        foreach ($data as $key => $value) {
            $grupos[$key + 1] = $value->NameAula;
        }
        return $grupos;
    }

}
