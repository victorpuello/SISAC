<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Model\Anio;
use ATS\Model\Asignacion;
use ATS\Model\Asignatura;
use ATS\Model\Docente;
use ATS\Transformers\AsignacionTransformer;
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\CreateAsignacionRequest;
use ATS\Http\Requests\UpdateAsignacionRequest;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $asignaciones = Asignacion::with(['docente','asignatura','grupo','anio'])->orderBy('created_at','desc');
        if ($request->ajax()){
            return datatables()->eloquent($asignaciones)->setTransformer(new AsignacionTransformer())->smart(true)->toJson();
        }
        return view('admin.asignaciones.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $docentes = Docente::orderBy('name','ASC')->pluck('name','id');
        $asignaturas = Asignatura::orderBy('name','ASC')->pluck('name','id');
        $anios = Anio::orderBy('name','ASC')->pluck('name','id');
        $grupos = grupos_pluck();
        return view('admin.asignaciones.ajax.create',compact('asignaciones','docentes','grupos','asignaturas','anios'));
    }

    /**
     * @param CreateAsignacionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAsignacionRequest $request)
    {
        $request->createAsignacion();
        return redirect()->route('asignacions.index');
    }

    /**
     * @param Asignacion $asignacion
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * @param Asignacion $asignacion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Asignacion $asignacion)
    {
        $docentes = Docente::orderBy('name','ASC')->pluck('name','id');
        $asignaturas = Asignatura::orderBy('name','ASC')->pluck('name','id');
        $anios = Anio::orderBy('name','ASC')->pluck('name','id');
        $grupos = grupos_pluck();
        return view('admin.asignaciones.ajax.edit',compact('asignacion','docentes','grupos','asignaturas','anios'));
    }

    /**
     * @param UpdateAsignacionRequest $request
     * @param Asignacion $asignacion
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAsignacionRequest $request, Asignacion $asignacion)
    {
        $asignacion->update($request->all());
        return redirect()->route('asignacions.index');
    }

    /**
     * @param Asignacion $asignacion
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Asignacion $asignacion)
    {
        $asignacion->delete();
        return redirect()->route('asignacions.index');
    }
}
