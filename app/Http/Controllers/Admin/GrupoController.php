<?php

namespace ATS\Http\Controllers\Admin;


use ATS\Http\Requests\CreateGrupoRequest;
use ATS\Http\Requests\UpdateGrupoRequest;
use ATS\Model\Grado;
use ATS\Model\Grupo;
use ATS\Model\Jornada;
use ATS\Transformers\GrupoTransformer;
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;
class GrupoController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $grupos = Grupo::with('grado')->with('jornada')->with('estudiantes')->orderBy('created_at','ASC');
        if($request->ajax()) {
            return datatables()->eloquent($grupos)
                ->setTransformer( new GrupoTransformer())
                ->addColumn('btn', 'admin.grupos.partials.actions')
                ->rawColumns(['btn'])
                ->smart(true)
                ->toJson();
        }
        return view('admin.grupos.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $grados = Grado::pluck('name','id');
        $jornadas = Jornada::pluck('name','id');
        return view('admin.grupos.ajax.create',compact('grados','jornadas'));
    }

    /**
     * @param CreateGrupoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateGrupoRequest $request)
    {
        $grupo = new Grupo($request->all());
        $grupo->save();
        return redirect()->route('grupos.index');
    }

    /**
     * @param Grado $grado
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request,Grupo $grupo)
    {
        $estudiantes = $grupo->estudiantes;
        if($request->ajax()) {
            return datatables()->collection($estudiantes)
                ->smart(true)
                ->toJson();
        }
        return view('admin.grupos.show',compact('grupo'));
    }

    /**
     * @param Grupo $grupo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Grupo $grupo)
    {
        $grados = Grado::pluck('name','id');
        $jornadas = Jornada::pluck('name','id');
        return view('admin.grupos.ajax.edit',compact('grupo','grados','jornadas'));
    }

    /**
     * @param UpdateGrupoRequest $request
     * @param Grupo $grupo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateGrupoRequest $request, Grupo $grupo)
    {
        $grupo->update($request->all());
        return redirect()->route('grupos.index');
    }

    /**
     * @param Grupo $grupo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();
        return redirect()->route('grupos.index');
    }
}
