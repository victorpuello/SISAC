<?php

namespace Ngsoft\Http\Controllers\Docente;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Ngsoft\Asignacion;
use Ngsoft\Asignatura;
use Ngsoft\DataTables\NotaDataTablesEditor;
use Ngsoft\Definitiva;
use Ngsoft\Estudiante;
use Ngsoft\Inasistencia;
use Illuminate\Http\Request;
use Ngsoft\Nota;
use Ngsoft\Periodo;
use Ngsoft\Planilla;
use Ngsoft\Transformers\EstudianteTransformer;
use Ngsoft\Http\Controllers\Controller;
class NotaController extends Controller
{
    private $fondos =  ['primary','secondary','tertiary','quaternary'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $fondos = $this->fondos;

        $asignaciones = Asignacion::where('docente_id','=',Auth::user()->docente->id)
            ->with('asignatura')
            ->with('salon')
            ->get();
        //hay que filtrar por el utlimo año
        $periodos = Periodo::all();
        return view('docente.notas.index',compact('asignaciones','fondos','periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NotaDataTablesEditor $editor
     * @return void
     */
    public function store(NotaDataTablesEditor $editor)
    {
        return $editor->process(request());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    public function getPlanilla(Asignacion $asignacion , Periodo $periodo)
    {
        return view('docente.notas.show',compact('asignacion','periodo'));
    }

    public function dataPlanilla(Request $request,Asignacion $asignacion , Periodo $periodo){
        //if($request->ajax()){
            $logros = $periodo->getlogros($asignacion);
            $codigo = $asignacion->salon->id.''.$asignacion->docente->id.''.$asignacion->asignatura->id.''.$periodo->id;
            $planilla = Planilla::where('codigo','=',$codigo)->get();
            $estudiantes = Estudiante::where('salon_id','=',$asignacion->salon->id)->where('stade','=','activo')
                ->with('notas')
                ->with('inasistencias')
                ->with('definitivas')
                ->get();
            if ($planilla->count() === 0){

                $this->verificador ($asignacion,$periodo,$logros);
                Planilla::create([
                    'grado' => $asignacion->salon->grade,
                    'docente' => $asignacion->docente->id,
                    'asignatura' => $asignacion->asignatura->id,
                    'periodo' => $periodo->id,
                    'codigo' => $codigo,
                    'creada' => 1
                ]);
            }
            return datatables()
                ->collection($estudiantes)
                ->setTransformer( new EstudianteTransformer($asignacion,$periodo,$logros))
                ->toJson();
       // }
    }


    public function verificador (Asignacion $asignacion,Periodo $periodo, $logros){
        $currentEstudiantes = Estudiante::where('salon_id','=',$asignacion->salon->id)
            ->where('stade','=','activo')
            ->with('definitivas')
            ->with('inasistencias')
            ->get();

        try{
            $this->VerificadorLogrosEstud($currentEstudiantes, $logros);
            $this->VerificadorDefinitivaEstud($currentEstudiantes, $asignacion->asignatura,$periodo);
            $this->VerificadorInasistenciasEstud($currentEstudiantes,$asignacion->asignatura,$periodo);
        }catch (\Exception $ex) {
            return view('errors.planilla');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ngsoft\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        return response()->json($nota);
    }


    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }


    /**
     * @param $estudiantes
     * @param $logros
     */
    public function VerificadorLogrosEstud ($estudiantes, $logros): void
    {
        foreach ($estudiantes as $estudiante) {
            $isFound = false;
            foreach ($logros as $logro) {
                if ($logro->getNotaExist($estudiante->id)->count() > 0) {
                    $isFound = true;
                }
            }
            if (!$isFound) {
                $_logros = $logros->where('indicador', '=', 'bajo');
                foreach ($_logros as $logro){
                    Nota::create([
                        'score'=>'1',
                        'estudiante_id' => $estudiante->id,
                        'logro_id' => $logro->id
                    ]);
                }
            }
        }
    }

    private function VerificadorInasistenciasEstud ($estudiantes,Asignatura $asignatura, Periodo $periodo)
    {
        foreach ($estudiantes as $estudiante){
            $Found = false;
            if ($estudiante->getInasistenciaExist($periodo->id,$asignatura->id)->count() > 0){
                $Found = true;
            }
            if (! $Found){
                Inasistencia::create([
                    'numero'=> 0,
                    'estudiante_id' => $estudiante->id,
                    'periodo_id' => $periodo->id,
                    'asignatura_id' => $asignatura->id
                ]);
            }
        }
    }
    /**
     * @param $estudiantes
     * @param Asignatura $asignatura
     * @param Periodo $periodo
     */
    private function VerificadorDefinitivaEstud ($estudiantes, Asignatura $asignatura, Periodo $periodo)
    {
        foreach ($estudiantes as $estudiante) {
            $Found = false;
            if ($estudiante->getDefinitivaExist($periodo->id, $asignatura->id)->count() > 0) {
                $Found = true;
            }
            if (!$Found) {
                Definitiva::create([
                    'score' => 1,
                    'estudiante_id' => $estudiante->id,
                    'periodo_id' => $periodo->id,
                    'asignatura_id' => $asignatura->id
                ]);
            }
        }
    }
}
