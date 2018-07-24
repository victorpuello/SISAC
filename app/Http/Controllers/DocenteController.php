<?php

namespace Ngsoft\Http\Controllers;

use Illuminate\Http\Request;
use Ngsoft\Asignatura;
use Ngsoft\Docente;
use Ngsoft\Http\Requests\CreateDocenteRequest;
use Ngsoft\Http\Requests\UpdateDocenteRequest;
use Ngsoft\User;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::all();
        $fondos = ['bg-primary','bg-secondary','bg-tertiary','bg-quaternary'];
        $asignaturas = Asignatura::all();
        foreach ($asignaturas as $key => $value){
            $asignaturas[$key]->name = $value->name;
        }
        return view('admin.docentes.index',compact('docentes','fondos','asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = User::where('type','=','docente')->orderBy('name', 'desc')->get();
        $users = array();
        foreach ($datas as $data){
            if (is_null($data->docente)){
                array_push($users,$data);
            }
        }
        return view('admin.docentes.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDocenteRequest $request)
    {
        $docente = new Docente($request->all());
        $docente->save();
        return redirect()->route('docentes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        $users = $docente->user;
        return view('admin.docentes.edit',compact('docente','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocenteRequest $request, $id)
    {
        $docente = Docente::findOrFail($id);
        $docente->fill($request->all());
        $docente->save();
        return redirect()->route('docentes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $user = User::findOrFail($docente->user->id);
        $docente->delete();
        $user->delete();
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function addAsignaturas(Request $request,$id){
        $asignaturas = $request->asignaturas_id;
        $docente = Docente::findOrFail($id);
        for ($i=0; $i<= count($asignaturas); $i++){
            $docente->asignaturas()->sync($asignaturas);
        }
        return redirect()->route('docentes.index');
    }
}
