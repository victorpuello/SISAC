<?php

namespace Ngsoft\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Ngsoft\Asignacion;
use Illuminate\Http\Request;
use Ngsoft\Asignatura;
use Ngsoft\Docente;
use Ngsoft\Http\Controllers\Controller;
use Ngsoft\Http\Requests\createAsignacionRequest;
use Ngsoft\Http\Requests\UpdateAsignacionRequest;
use Ngsoft\Salon;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $asignaciones;
    private $docentes;
    private $salones_todos;
    private $asignaturas;
    public function __construct ()
    {
        $this->asignaciones = Asignacion::all();
        $this->docentes = Docente::orderBy('name','ASC')->pluck('name','id');
        $this->salones_todos = Salon::orderBy('name','ASC')->get();
        $this->asignaturas = Asignatura::orderBy('name','ASC')->pluck('name','id');
    }

    public function index()
    {
        if (currentPerfil() <> 'docente'){
            $asignaciones = $this->asignaciones;
        }else{
            $asignaciones = $this->asignaciones->where('docente_id','=', Auth::user()->docente->id);
        }
        $docentes = $this->docentes;
        $asignaturas = $this->asignaturas;
        //dd($this->salones_todos);
        $sal= collect();
        foreach ($this->salones_todos as $salon){
            $sal->push([
                'id'=>$salon->id,
                'nombre'=>$salon->full_name,
                'grado'=>$salon->grade,
            ]);
        }
        $salones = $sal->sortBy('grado')->pluck('nombre','id');
        return view('admin.asignaciones.index',compact('asignaciones','docentes','salones','asignaturas'));
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
    public function store(CreateAsignacionRequest $request)
    {
        $asignacion = new Asignacion($request->all());
        $asignacion->save();
        return redirect()->route('asignaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ngsoft\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacion $asignacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsignacionRequest $request, $id)
    {
        $asignacion = Asignacion::findOrFail($id);
        $asignacion->fill($request->all());
        $asignacion->save();
        return redirect()->route('asignaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asignacion = Asignacion::findOrFail($id);
        $asignacion->delete();
        return redirect()->route('asignaciones.index');
    }
}
