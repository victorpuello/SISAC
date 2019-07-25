<?php

namespace ATS\Http\Controllers\Admin;


use ATS\Http\Requests\CreateAsignaturaRequest;
use ATS\Model\Area;
use ATS\Model\Asignatura;
use ATS\Transformers\AsignaturaTransformer;
use Illuminate\Validation\Rule;
use ATS\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{

    public function index(Request $request)
    {
        $asignaturas = Asignatura::with('area')->orderBy('name','ASC');
        if ($request->ajax()){
            return datatables()->eloquent($asignaturas)->setTransformer(new AsignaturaTransformer())->smart(true)->toJson();
        }
        return view('admin.asignaturas.index');
    }

    public function create()
    {
        $areas = Area::pluck('name','id');
        return view('admin.asignaturas.ajax.create',compact('areas'));
    }

    public function store(CreateAsignaturaRequest $request)
    {
        $asignatura = new Asignatura($request->all());
        $asignatura->save();
        return redirect()->route('asignaturas.index');
    }

    public function show(Asignatura $asignatura)
    {

    }

    public function edit(Asignatura $asignatura)
    {
        $areas = Area::pluck('name','id');
        return view('admin.asignaturas.ajax.edit',compact('areas','asignatura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ATS\Asignatura  $asignatura
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
