<?php

namespace Ngsoft\Http\Controllers;

use Ngsoft\Docente;
use Illuminate\Http\Request;
use Ngsoft\Http\Requests\CreateDocenteRequest;
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
        $docentes = Docente::where('coordinator','=','0')->get();
        $fondos = ['bg-primary','bg-secondary','bg-tertiary','bg-quaternary'];
        return view('admin.docentes.index',compact('docentes','fondos'));
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
     * @param  \Ngsoft\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        //
    }
}
