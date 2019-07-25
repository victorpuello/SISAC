<?php

namespace ATS\Http\Controllers\Docente;


use ATS\Clases\CurrentPeriodo;
use ATS\Events\CreatePlanillasEvent;
use ATS\Events\LlenarPlanillasEvent;
use ATS\Http\Controllers\Controller;
use ATS\Model\Anio;
use ATS\Model\Docente;
use ATS\Model\Planilla;
use ATS\Transformers\EstudianteTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanillaController extends Controller
{
    /**
     * @var Docente
     */
    private $docente;

   public function __construct (Request $request){
        $this->middleware(function ($request, $next) {
            $this->docente = Auth::user()->docente;
            event(new CreatePlanillasEvent($this->docente));
            return $next($request);
        });
   }
   public function index(){
       $periodo = new CurrentPeriodo();
       $docente = $this->docente->load(['planillas.asignacion.asignatura','planillas.asignacion.grupo.estudiantes','planillas.asignacion.grupo.grado']);
       $planillas = $docente->planillas->where('periodo_id','=',$periodo->getPeriodo()->id);
       $pdo = $periodo->getPeriodo();
       return view('docente.planillas.index',compact('planillas','docente','pdo'));
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
        return view('docente.planillas.show', compact('planilla'));
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


}
