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
    private $fondos =  ['primary','secondary','tertiary','quaternary'];
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
        $periodos = Periodo::all();
        //dd($planillas);
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

        $logroCog = $this->getLogro($request,'cognitivo',$request->logro_cog);
        $logroAct = $this->getLogro($request,'actitudinal',$request->logro_ac);
        $logroProc = $this->getLogro($request,'procedimental',$request->logro_pro);;
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
        $salon = Salon::find($Idsalon);
        $estudiantes = DB::table('estudiantes')
            ->where('salon_id','=',$Idsalon)
            ->orderBy('lastname','asc')
            ->get();
        //dd($Idsalon,$Iddocente,$Idasignatura,$IdPeriodo);
       /* $logros = DB::table('logros')
            ->where('periodo_id','=',$IdPeriodo)
            ->where('docente_id','=',$Iddocente)->get();

        dd($logros);*/

        return view('admin.notas.show',compact('estudiantes','logros','Idsalon','Iddocente','Idasignatura','Idperiodo'));
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


}
