<?php

namespace Ngsoft\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Ngsoft\DataTables\NotaDataTablesEditor;
use Ngsoft\Estudiante;
use Ngsoft\Logro;
use Illuminate\Http\Request;
use Ngsoft\Nota;
use Ngsoft\Periodo;
use Ngsoft\Salon;
use Ngsoft\Transformers\EstudianteTransformer;
use Yajra\DataTables\Facades\DataTables;

class NotaController extends Controller
{
    private $estudiantes;
    private $notas;
    private $logros;
    private $fondos =  ['primary','secondary','tertiary','quaternary'];
    public function __construct ()
    {
        // revisar a futuro para delimitar la cantidad de datos que llegan al controlador
        $this->estudiantes = Estudiante::where('stade','=','activo')->get();
        $this->notas = Nota::all();
        $this->logros = Logro::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $fondos = $this->fondos;
        switch (Auth::user()->type){
            case 'docente':
                $docente = Auth::user()->docente;
                $planillas = DB::table('asignacions')
                    ->where('docente_id','=',$docente->id)
                    ->join('salons','salons.id','=','asignacions.salon_id')
                    ->join('docentes','docentes.id','=','asignacions.docente_id')
                    ->join('asignaturas','asignaturas.id','=','asignacions.asignatura_id')
                    ->select('salons.*','docentes.name as nombre','docentes.id as idDocente','asignaturas.id as idAsignaturas','asignaturas.name as asignatura')
                    ->get();
                break;
            default:
                $planillas = DB::table('asignacions')
                    ->join('salons','salons.id','=','asignacions.salon_id')
                    ->join('docentes','asignacions.docente_id','=','docentes.id')
                    ->join('asignaturas','asignaturas.id','=','asignacions.asignatura_id')
                    ->select('salons.*','docentes.name as nombre','docentes.id as idDocente','asignaturas.id as idAsignaturas','asignaturas.name as asignatura')
                    ->get();
                break;
        }
        //hay que filtrar por el utlimo año
        $periodos = Periodo::all();
       // dd($planillas);
        return view('admin.notas.index',compact('planillas','fondos','periodos'));
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

    public function cargarPlanilla(Request $request,$Idsalon,$Iddocente,$Idasignatura,$Idperiodo){
        $grado = Salon::find($Idsalon)->grade;
        //obtengo todos los estudiantes del salon
        $currentEstudiantes =$this->estudiantes->where('salon_id','=',$Idsalon);
        try{
            // obtengos los logros para esa asignuatura periodo y grado requeridos
            $currentlogros_Cog = $this->getLogros($grado,$Iddocente,$Idasignatura,$Idperiodo,'cognitivo');
            $currentlogros_Act = $this->getLogros($grado,$Iddocente,$Idasignatura,$Idperiodo,'actitudinal');
            $currentlogros_Proc = $this->getLogros($grado,$Iddocente,$Idasignatura,$Idperiodo,'procedimental');
            // verifico si tienen la relacion con los losgros del docente para este periodo
            // si no existe la relacion la creo vinculandolo con el logro de indicador bajo
            $this->VerificadorLogrosEstud($currentEstudiantes, $currentlogros_Cog);
            $this->VerificadorLogrosEstud($currentEstudiantes, $currentlogros_Act);
            $this->VerificadorLogrosEstud($currentEstudiantes, $currentlogros_Proc);
        }catch (\Exception $ex) {
            return view('error.planilla');
        }
        $estudiantes = $currentEstudiantes;
        if($request->ajax()){
            return datatables()
                    ->collection($estudiantes)
                    ->setTransformer( new EstudianteTransformer($grado,$Idasignatura,$Iddocente,$Idperiodo))
                    ->with('id_salon',$Idsalon)
                    ->with('grado',$grado)
                    ->with('id_docente',$Iddocente)
                    ->with('id_asignatura',$Idasignatura)
                    ->with('id_periodo',$Idperiodo)
                    ->toJson();
        }

        return view('admin.notas.show',compact('Idsalon','grado','Iddocente','Idasignatura','Idperiodo'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        /*dd($request->all());
        $nota = Nota::findOrFail($id);
        $newLogro = $this->getLogro($request);
        $request->merge(array('logro_id'=> $newLogro->id));
        $nota->fill($request->all());
        $nota->save();
        $response = array(
            'status' => 'success',
            'msg' => 'Nota guardada con exito',
        );
        return response()->json($response);*/
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
     * @param Estudiante $estudiantes
     * @param Logro $logros
     * @param $categoria
     */
    public function VerificadorLogrosEstud ($estudiantes,$logros): void
    {
        foreach ($estudiantes as $estudiante) {
            $isFound = false;
            foreach ($logros as $logro) {
                if ($this->LogroExist($estudiante->id, $logro->id)) {
                    $isFound = true;
                }
            }
            if (!$isFound) {
                $logro = $logros->where('indicador', '=', 'bajo')->first();
                $currentEstudiante = $this->estudiantes->find($estudiante->id);
                $nota = new Nota([
                    'score'=>'1',
                    'estudiante_id' => $currentEstudiante->id,
                    'logro_id' => $logro->id
                ]);
                $nota->save();
            }
        }
    }
    /**
     * Metodo para verificar si el logro esta relacionado con el estudiante
     * @param $idEstudiante
     * @param $idLogro
     * @return bool
     */
    public function LogroExist($idEstudiante, $idLogro){
        $logros = $this->notas->where('estudiante_id','=',$idEstudiante);
        $cont_logro = $logros->where('logro_id','=',$idLogro)->count();

        if ($cont_logro > 0){
            return true;
        }
        return false;
    }
    /**
     * Metodo para Buscar los logros por categorias para este periodo
     * @param $salon
     * @param $docente
     * @param $asignatura
     * @param $periodo
     * @param $category
     * @return \Illuminate\Support\Collection
     */
    public function getLogros($salon, $docente, $asignatura, $periodo, $category){

        $logros = DB::table('logros')
            ->where('docente_id','=',$docente)
            ->where('asignatura_id','=',$asignatura)
            ->where('grade','=',$salon)
            ->where('periodo_id','=',$periodo)
            ->where('category','=',$category)
            ->get();
       // dd($logros);
        return  $logros;
    }

    /**
     * @param $request
     * @param $category
     * @param $nota
     * @return \Illuminate\Support\Collection
     */

}
