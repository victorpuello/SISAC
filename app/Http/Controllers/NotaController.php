<?php

namespace Ngsoft\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ngsoft\Asignacion;
use Ngsoft\Asignatura;
use Ngsoft\Estudiante;
use Ngsoft\Logro;
use Illuminate\Http\Request;
use Ngsoft\Periodo;
use Ngsoft\Salon;

class NotaController extends Controller
{
    private $estudiantes;
    private $logros;
    private $fondos =  ['primary','secondary','tertiary','quaternary'];
    public function __construct ()
    {
        // revisar a futuro para delimitar la cantidad de datos que llegan al controlador
        $this->estudiantes = Estudiante::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $estudiante = Estudiante::findOrFail($request->estudiante_id);

        $logroCog = $this->getLogro($request,'cognitivo',$request->logro_cog,true);
        $logroAct = $this->getLogro($request,'actitudinal',$request->logro_ac,true);
        $logroProc = $this->getLogro($request,'procedimental',$request->logro_pro,true);;
       /* $estudiante->logros()->attach($logroCog->id, ['score' => $request->logro_cog]);
        $estudiante->logros()->attach($logroAct->id, ['score' => $request->logro_ac]);
        $estudiante->logros()->attach($logroProc->id, ['score' => $request->logro_pro]);*/
        $estudiante->logros()->syncWithoutDetaching([$logroCog->id => ['score' => $request->logro_cog]]);
        $estudiante->logros()->syncWithoutDetaching([$logroAct->id => ['score' => $request->logro_ac]]);
        $estudiante->logros()->syncWithoutDetaching([$logroProc->id => ['score' => $request->logro_pro]]);
        return redirect()->action(
            'NotaController@cargarPlanilla', [
                'Idsalon' => $request->salon_id,
                'Iddocente' => $request->docente_id,
                'Idasignatura' => $request->asignatura_id,
                'Idperiodo' => $request->periodo_id
            ]);
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

    public function cargarPlanilla($Idsalon,$Iddocente,$Idasignatura,$Idperiodo){
        $grado = Salon::find($Idsalon)->grade;
        //obtengo todos los estudiantes del salon
        $currentEstudiantes =$this->estudiantes->where('salon_id','=',$Idsalon);
        // obtengos los logros para esa asignuatura periodo y grado requeridos
        $currentlogros_Cog = $this->getLogros($grado,$Iddocente,$Idasignatura,$Idperiodo,'cognitivo');
        $currentlogros_Act = $this->getLogros($grado,$Iddocente,$Idasignatura,$Idperiodo,'actitudinal');
        $currentlogros_Proc = $this->getLogros($grado,$Iddocente,$Idasignatura,$Idperiodo,'procedimental');
        // verifico si tienen la relacion con los losgros del docente para este periodo
        // si no existe la relacion la creo vinculandolo con el logro de indicador bajo
        $this->VerificadorLogrosEstud($currentEstudiantes, $currentlogros_Cog);
        $this->VerificadorLogrosEstud($currentEstudiantes, $currentlogros_Act);
        $this->VerificadorLogrosEstud($currentEstudiantes, $currentlogros_Proc);

        /*$estudiantes = DB::table('estudiantes')
            ->where('salon_id','=',$Idsalon)
            ->join('logros','estudiantes.grade','=','logros.grade')
            ->get();*/


        /*$estudiantes = Estudiante::whereHas('logros', function ($q) use ($grado,$Idasignatura,$Idperiodo,$Iddocente){
            $q->where('grade','=',$grado);
            $q->where('asignatura_id','=',$Idasignatura);
            $q->where('periodo_id','=',$Idperiodo);
            $q->where('docente_id','=',$Iddocente);
        })->get();
        */

        $estudiantes = DB::table('logros')->where([
            ['grade','=',$grado],
            ['asignatura_id','=',$Idasignatura],
            ['periodo_id','=',$Idperiodo],
            ['docente_id','=',$Iddocente]])
            ->join('estudiantes','logro_id','=','estudiante_logro.logro_id')
            ->select('logros.*')
            ->get();
        dd($estudiantes);
      return view('admin.notas.show',compact('estudiantes','Idsalon','Iddocente','Idasignatura','Idperiodo'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ngsoft\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        //
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
        //dd($logros);
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
                $currentEstudiante->logros()->attach($logro->id, ['score' => '1']);
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
        $estudiante = $this->estudiantes->find($idEstudiante);
        $logros = $estudiante->logros;
        $cont_logro = $logros->where('id','=',$idLogro)->count();
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
        return  $logros;
    }

    /**
     * @param $request
     * @param $category
     * @param $nota
     * @return \Illuminate\Support\Collection
     */
    public function getLogro($request, $category,$nota){
        $grado = Salon::find($request->salon_id)->grade;
        $logro = DB::table('logros')
            ->where('docente_id','=',$request->docente_id)
            ->where('asignatura_id','=',$request->asignatura_id)
            ->where('grade','=',$grado)
            ->where('periodo_id','=',$request->periodo_id)
            ->where('category','=',$category)
            ->where('indicador','=',$this->getIndicador($nota))
            ->first();
        return  $logro;
    }

    public function getIndicador($nota){
        if ($nota <= 5.9 ){
            return "bajo";
        }elseif ($nota >= 6 && $nota < 8){
            return "basico";
        }elseif ($nota >= 8 && $nota < 9.5){
            return "alto";
        }elseif ($nota >= 9.5 && $nota <= 10){
            return "superior";
        }
        else{
            return "Revisar notas";
        }

    }
}
