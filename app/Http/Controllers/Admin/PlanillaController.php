<?php

namespace ATS\Http\Controllers\Admin;


use ATS\Clases\Estudiante\CurrentDefinitiva;
use ATS\Clases\Estudiante\CurrentNota;
use ATS\Events\LlenarPlanillasEvent;
use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\FiltroRequest;
use ATS\Model\Anio;
use ATS\Model\Docente;
use ATS\Model\Planilla;
use ATS\Transformers\EstudianteTransformer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PlanillaController extends Controller
{
   public function index(FiltroRequest $request){
       $docente = Docente::with(['planillas.asignacion.asignatura','planillas.asignacion.grupo.estudiantes','planillas.asignacion.grupo.grado'])->findOrFail($request->docente_id);
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
        event(new LlenarPlanillasEvent($planilla));
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

    public function update(Request $request, Planilla $planilla)
    {
        $planilla->update($request->all());
        $data = [
            'messaje' => 'Planilla editada con exito'
        ];
        return response()->json($data,200);
    }

    public function destroy(Planilla $planilla)
    {

    }

    public function getFiltro(Request $request){
        $docentes = Docente::has('asignaciones')->pluck('name','id');
        $anios = Anio::pluck('name','id');
        return view('admin.planillas.ajax.filtro',compact('docentes','anios'));
    }

    public function reset(Planilla $planilla){
        $planilla->load('asignacion.docente','periodo.anio');
        $planilla->update(['cargada'=>0]);
        return redirect()->back();
    }
    // Este metodo se puede quitar posteriormente
    public function updateDefinitivas(Planilla $planilla){
        $planilla->load('asignacion.grupo.estudiantes','periodo','asignacion.asignatura');
        $estudiantes = $planilla->asignacion->grupo->estudiantes;
        foreach ($estudiantes as $estudiante){
            $currentNotas = new CurrentNota($estudiante, $planilla);
            $definitiva = new CurrentDefinitiva($estudiante,$planilla->periodo);
            $definitivaAnio = $definitiva->singleDefinitivaAnio($planilla->asignacion->asignatura);
            DB::beginTransaction();
            try{
                $score = $currentNotas->scoreDef($planilla->asignacion->asignatura);
                $definitiva->updateDefinitiva($definitiva->singleDefinitivaAsignatura($planilla->asignacion->asignatura),[
                    'score' => $score,
                    'indicador' => indicador($score),
                ]);
                $definitivaAnio->update([
                    'score' => $definitiva->getScoreFinal($planilla->asignacion->asignatura, $planilla->periodo, $score),
                    'indicador' => indicador($definitiva->getScoreFinal($planilla->asignacion->asignatura, $planilla->periodo, $score)),
                ]);
            }catch (ValidationException $e){
                DB::rollBack();
                return redirect()->back();
            }
            DB::commit();
        }
        $data = [
            'messaje' => 'Guardado con exito'
        ];
        return redirect()->route('planillas.index');
    }

}
