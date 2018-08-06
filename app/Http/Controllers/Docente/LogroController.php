<?php

namespace Ngsoft\Http\Controllers\Docente;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Ngsoft\Asignacion;
use Ngsoft\Asignatura;
use Ngsoft\Docente;
use Ngsoft\Http\Requests\CreateLogroRequest;
use Ngsoft\Http\Requests\UpdateLogroRequest;
use Ngsoft\Logro;
use Illuminate\Http\Request;
use Ngsoft\Periodo;
use Ngsoft\Salon;
use Ngsoft\User;
use Ngsoft\Http\Controllers\Controller;
class LogroController extends Controller
{
    public $periodos = [];
    public $logros = [];
    public $grados = [];
    public $asignaturas = [];
    protected  $docente;
    protected $asignaciones;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct (Request $request)
    {

        $this->middleware(function ($request, $next) {
            $this->docente = Auth::user()->docente;
            $this->asignaciones = Asignacion::where('docente_id','=',$this->docente->id)->get();
            return $next($request);
        });


        // $this->asignaciones = Asignacion::where('docente_id','=',$this->docente->id);
    }

    public function index()
    {

        Session::forget('busqueda');
        $datos = $this->loadDataBuscador(1);
        $datos = json_decode($datos->content());
        $periodos = $datos->periodos;
        $asignaturas = $datos->asignaturas;
        $grados = $datos->grados;
        $logros = DB::table('logros')
                ->where('docente_id','=', $this->docente->id)
                ->orderBy('created_at', 'desc')
                ->get(['id','description','category','grade','indicador','code']);
        return view('docente.logros.index',compact('logros','docentes','periodos','asignaturas','grados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos = $this->loadDataBuscador(1);
        $datos = json_decode($datos->content());
        $periodos = $datos->periodos;
        $asignaturas = $datos->asignaturas;
        $grados = $datos->grados;
        return view('docente.logros.create',compact('docentes','periodos','asignaturas','grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLogroRequest $request)
    {
        $indicadores = array('bajo','basico','alto','superior');
        if ($request->multiple === '0'){
            for ($i=0; $i < count($indicadores); $i++){
               //$request->merge(array('code'=> $this->codeGen($request,$indicadores[$i])));
                $request->merge(array('indicador'=> $indicadores[$i]));
                if ($i > 0){
                    $request->merge(array('description'=> "Agregar descripción "));
                }
                $logro = new Logro($request->all());
                $logro->save();
                //dd($indicadores[$i]);
            }
        }else{
            $logro = new Logro($request->all());
            $logro->save();
        }

        return redirect()->action('Docente\LogroController@index');
    }

    /**
     * @param $request
     * @param $indicador
     * @return string
     */
    public function codeGen($request, $indicador){
        $code = $request->codeUser.''.$request->category.''.$indicador.''.$request->grade.''.$request->asignatura_id.''.$request->docente_id.''.$request->periodo_id;
        return $code;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Logro  $logro
     * @return \Illuminate\Http\Response
     */
    public function show(Logro $logro)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ngsoft\Logro  $logro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logro = Logro::findOrFail($id);
        $datos = $this->loadDataBuscador(1);
        $datos = json_decode($datos->content());
        $periodos = $datos->periodos;
        $asignaturas = $datos->asignaturas;
        $grados = $datos->grados;
        return view('docente.logros.edit',compact('logro','docentes','periodos','asignaturas','grados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Logro  $logro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLogroRequest $request, $id)
    {
        $logro = Logro::findOrFail($id);
        $logro->fill($request->all());
        $logro->save();
        return redirect()->action('Docente\LogroController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Logro  $logro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logro = Logro::findOrFail($id);
        $logro->delete();
        return redirect()->action('LogroController@index');
    }

    public function loadDataBuscador ($id) {
        $data['periodos'] = Periodo::pluck('name', 'id');
            $asignaciones = $this->asignaciones;
            $grados = [];
            $asignaturas=[];
            foreach ($asignaciones as  $asignacion) {
                $grados[$asignacion->salon->grade] = $asignacion->salon->name_grade;
                $asignaturas[$asignacion->asignatura->id] = $asignacion->asignatura->name;
            }
            $data['grados'] = array_unique($grados);
            $data['asignaturas'] = array_unique($asignaturas);
        return response()->json($data);
    }

    public function FindNotes(Request $request){
        $periodo = $request->periodo;
        $grado = $request->grado;
        $asignatura = $request->asignatura;
        $request->session()->put('busqueda', true);
        $docente = $this->docente->id;
                $logros = DB::table('logros')->where([
                    ['periodo_id','=',$periodo],
                    ['docente_id','=',$docente],
                    ['asignatura_id','=',$asignatura],
                    ['grade','=',$grado]
                ])->get(['id','description','category','grade','indicador','code']);
        $datos = $this->loadDataBuscador(1);
        $datos = json_decode($datos->content());
        $periodos = $datos->periodos;
        $asignaturas = $datos->asignaturas;
        $grados = $datos->grados;
        return view('docente.logros.index',compact('logros','periodos','asignaturas','grados','docentes'));
    }

}

