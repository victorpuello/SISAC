<?php

namespace ATS\Http\Controllers\Admin;


use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\FiltroRequest;
use ATS\Model\Anio;
use ATS\Model\Docente;
use ATS\Model\Planilla;
use ATS\Transformers\EstudianteTransformer;
use Illuminate\Http\Request;

class PlanillaController extends Controller
{
   public function index(FiltroRequest $request){
       $docente = Docente::with(['planillas.asignacion.asignatura','planillas.asignacion.grupo.grado'])->findOrFail($request->docente_id);
       $planillas = $docente->planillas->where('periodo_id','=',$request->periodo_id);
       return view('admin.planillas.index',compact('planillas','docente'));
   }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Request $request, Planilla $planilla)
    {
        $planilla->load(['asignacion.grupo.grado','asignacion.docente.indicadores','asignacion.grupo.grado','asignacion.asignatura','periodo','asignacion.grupo.estudiantes.notas','asignacion.grupo.estudiantes.inasistencias']);
        $estudiantes = $planilla->asignacion->grupo->estudiantes->sortBy('lastname');
        if ($request->ajax()){
            return datatables()->collection($estudiantes)->setTransformer( new EstudianteTransformer($planilla))->toJson();
        }
        return view('admin.planillas.show', compact('planilla'));
    }

    public function edit(Planilla $planilla)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy(Planilla $planilla)
    {

    }

    public function getFiltro(Request $request){
        $docentes = Docente::has('asignaciones')->pluck('name','id');
        $anios = Anio::pluck('name','id');
        return view('admin.planillas.ajax.filtro',compact('docentes','anios'));
    }

}
