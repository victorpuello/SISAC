<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Model\Departamento;
use ATS\Model\Estudiante;
use ATS\Model\Grupo;
use ATS\Model\Municipio;
use Illuminate\Http\Request;
use ATS\Http\Requests\CreateEstudianteRequest;
use ATS\Http\Requests\UpdateEstudianteRequest;
use ATS\Http\Controllers\Controller;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estudiantes = Estudiante::with('grupo.grado')->orderBy('created_at','ASC');
        if($request->ajax()) {
            return datatables()
                ->eloquent($estudiantes)
                ->addColumn('btn', 'admin.estudiantes.partials.actions')
                ->addColumn('grupo', function (Estudiante $estudiante) {
                    return $estudiante->grupo->name_aula;
                })
                ->rawColumns(['btn'])
                ->smart(true)
                ->toJson();
        }
        return view('admin.estudiantes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::pluck('name','id');
        $municipios = Municipio::pluck('name','id');
        $grupos = $this->getGrupo();
        return view('admin.estudiantes.ajax.create',compact('departamentos','grupos','municipios'));
    }


    /**
     * @param CreateEstudianteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateEstudianteRequest $request)
    {
        $estudiante = new Estudiante($request->all());
        $estudiante->save();

        $data = [
            'estudiante'=>$estudiante,
            'messaje' => 'Guardado con exito'
            ];
        return response()->json($data,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        $municipio = Municipio::findOrFail($estudiante->birthcity);
        return view('admin.estudiantes.show', compact('estudiante','municipio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        $departamentos = Departamento::pluck('name','id');
        $municipios = Municipio::pluck('name','id');
        $grupos = $this->getGrupo();
        return view('admin.estudiantes.edit',compact('estudiante','grupos','departamentos','municipios'));
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
        return redirect()->route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return redirect()->back();
    }

    /**
     * @return array
     */
    public function getGrupo (): array
    {
        $data = Grupo::all();
        $grupos = [];
        foreach ($data as $key => $value) {
            $grupos[$key + 1] = $value->NameAula;
        }
        return $grupos;
    }
}
