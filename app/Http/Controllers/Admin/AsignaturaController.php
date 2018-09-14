<?php

namespace Ngsoft\Http\Controllers\Admin;

use Illuminate\Validation\Rule;
use Ngsoft\Http\Controllers\Controller;
use Validator;
use Ngsoft\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::all();
        return view('admin.asignaturas.index', compact('asignaturas'));
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'string|max:40|unique:asignaturas',
            'short_name' => 'string|max:5|unique:asignaturas'
        ]);
        if ($validator->fails()){
            return redirect()->route('asignaturas.index')->withErrors($validator)->withInput();
        }
        $asignatura = new Asignatura($request->all());
        $asignatura->save();
        return redirect()->route('asignaturas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return void
     */
    public function edit($id)
    {
        $asignatura = Asignatura::findOrFail($id);
        return response()->json($asignatura);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $asignatura = Asignatura::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name' => 'string|max:40',Rule::unique('asignaturas')->ignore($asignatura->id, 'asignaturas_id'),
            'short_name' => 'string|max:5',Rule::unique('asignaturas')->ignore($asignatura->id, 'asignaturas_id')
        ]);
        if ($validator->fails()){
            return redirect()->route('asignaturas.index')->withErrors($validator)->withInput();
        }
        $asignatura->fill($request->all());
        $asignatura->save();
        return redirect()->route('asignaturas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asignatura = Asignatura::findOrFail($id);
        $asignatura->delete();
        return redirect()->back();
    }


}
