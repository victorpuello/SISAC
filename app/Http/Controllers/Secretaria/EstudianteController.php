<?php

namespace ATS\Http\Controllers\Secretaria;

use ATS\Model\{Departamento,Estudiante,Municipio,Grupo};
use Illuminate\Http\Request;
use ATS\Http\Requests\CreateEstudianteRequest;
use ATS\Http\Requests\UpdateEstudianteRequest;
use ATS\Http\Controllers\Controller;

class EstudianteController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $estudiantes = Estudiante::with('grupo.grado')->orderBy('created_at','ASC');
        if($request->ajax()) {
            return datatables()
                ->eloquent($estudiantes)
                ->addColumn('btn', 'secretaria.estudiantes.partials.actions')
                ->addColumn('grupo', function (Estudiante $estudiante) {
                    return $estudiante->grupo->name_aula;
                })
                ->rawColumns(['btn'])
                ->smart(true)
                ->toJson();
        }
        return view('secretaria.estudiantes.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $departamentos = Departamento::pluck('name','id');
        $municipios = Municipio::pluck('name','id');
        $grupos = $this->getGrupo();
        return view('secretaria.estudiantes.ajax.create',compact('departamentos','grupos','municipios'));
    }

    /**
     * @param CreateEstudianteRequest $request
     * @return \Illuminate\Http\JsonResponse
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
     * @param Estudiante $estudiante
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Estudiante $estudiante)
    {
        $municipio = Municipio::findOrFail($estudiante->birthcity);
        return view('secretaria.estudiantes.show', compact('estudiante','municipio'));
    }

    /**
     * @param Estudiante $estudiante
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Estudiante $estudiante)
    {
        $departamentos = Departamento::pluck('name','id');
        $municipios = Municipio::pluck('name','id');
        $grupos = $this->getGrupo();
        return view('secretaria.estudiantes.edit',compact('estudiante','grupos','departamentos','municipios'));
    }

    /**
     * @param UpdateEstudianteRequest $request
     * @param Estudiante $estudiante
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateEstudianteRequest $request, Estudiante $estudiante)
    {
        $estudiante->update($request->all());
        return redirect()->route('secretaria.estudiantes.index');
    }

    /**
     * @param Estudiante $estudiante
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
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
