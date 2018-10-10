<?php

namespace ATS\Http\Controllers\Admin;



use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\CreateJornadaRequest;
use ATS\Http\Requests\UpdateJornadaRequest;
use ATS\Model\Jornada;


class JornadaController extends Controller
{
    public function index()
    {
        $jornadas = Jornada::all();
        return view('admin.jornadas.index',compact('jornadas'));
    }
    public function create()
    {
        return view('admin.jornadas.ajax.create');
    }
    public function store(CreateJornadaRequest $request)
    {
        $jornada = new Jornada($request->all());
        $jornada->save();
        return redirect()->route('jornadas.index');
    }
    public function show(Jornada $jornada)
    {
       //
    }
    public function edit(Jornada $jornada)
    {
        return view('admin.jornadas.ajax.edit',compact('jornada'));
    }
    public function update(UpdateJornadaRequest $request, Jornada $jornada)
    {
        $jornada->update($request->all());
        return redirect()->route('jornadas.index');
    }
    public function destroy(Jornada $jornada)
    {
        $jornada->delete();
        return redirect()->route('jornadas.index');
    }
}
