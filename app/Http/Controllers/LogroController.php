<?php

namespace Ngsoft\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ngsoft\Asignatura;
use Ngsoft\Http\Requests\CreateLogroRequest;
use Ngsoft\Http\Requests\UpdateLogroRequest;
use Ngsoft\Logro;
use Illuminate\Http\Request;
use Ngsoft\Periodo;

class LogroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (Auth::user()->type){
            case 'docente':
                return $this->runDocenteView();
                break;
            default:
                return $this->getViewOtherUsers();
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLogroRequest $request)
    {
        $logro = new Logro($request->all());
        $logro->save();
        switch (Auth::user()->type){
            case 'docente':
                return $this->runDocenteView();
                break;
            default:
                return $this->getViewOtherUsers();
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Logro  $logro
     * @return \Illuminate\Http\Response
     */
    public function show(Logro $logro)
    {
        //
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
        return response()->json($logro);
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
        switch (Auth::user()->type){
            case 'docente':
                return $this->runDocenteView();
                break;
            default:
                return $this->getViewOtherUsers();
                break;
        }
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
        switch (Auth::user()->type){
            case 'docente':
                return $this->runDocenteView();
                break;
            default:
                return $this->getViewOtherUsers();
                break;
        }
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function runDocenteView ()
    {
        try {
            $periodos = Periodo::pluck('name', 'id');
            $salones = Auth::user()->docente->salones;
            $grados = [];
            foreach ($salones as $key => $salon) {
                $grados[$salon->grade] = $salon->getNameGradeAttibute();
            }
            $grados = array_unique($grados);
            $asignaturas = Auth::user()->docente->asignaturas->pluck('name', 'id');
            $logros = [];
            return view('admin.logros.index', compact('periodos', 'asignaturas', 'grados', 'logros'));
        } catch (\Exception $e) {
            return back()->withErrors($e);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getViewOtherUsers ()
    {
        $logros = DB::table('users')
            ->join('docentes', 'users.id', '=', 'docentes.user_id')
            ->join('logros', 'docentes.id', '=', 'logros.docente_id')
            ->select('logros.*', 'docentes.*', 'users.*')
            ->get();
        $asignaturas = Asignatura::pluck('name', 'id');
        $grados = ['0' => 'Pre-Escolar', '1' => 'Primero', '2' => 'Segundo', '3' => 'Tercero', '4' => 'Cuarto', '5' => 'Quinto', '6' => 'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno', '10' => 'Decimo', '11' => 'Once'];
        $periodos = Periodo::pluck('name', 'id');
        return view('admin.logros.index', compact('logros', 'asignaturas', 'grados', 'periodos'));
    }
}
