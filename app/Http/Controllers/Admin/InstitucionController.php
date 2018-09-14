<?php

namespace Ngsoft\Http\Controllers\Admin;

use Ngsoft\Http\Requests\CreateInstitucionRequest;
use Ngsoft\Http\Requests\UpdateInstitucionRequest;
use Ngsoft\Institucion;
use Illuminate\Http\Request;
use Ngsoft\Http\Controllers\Controller;
class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institucion = Institucion::first();
        return view('admin.institucion.index',compact('institucion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.institucion.ajax.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInstitucionRequest $request)
    {

        $institucion = new Institucion($request->all());
        $institucion->save();
        return view('admin.institucion.index',compact('institucion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show(Institucion $institucion)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Ngsoft\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Institucion $institucion)
    {
        return view('admin.institucion.ajax.edit',compact('institucion'));
    }


    /**
     * @param UpdateInstitucionRequest $request
     * @param Institucion $institucion
     */
    public function update(UpdateInstitucionRequest $request, Institucion $institucion)
    {
        $institucion->fill($request->all());
        $institucion->save();
        return view('admin.institucion.index',compact('institucion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institucion $institucion)
    {
        //
    }
}
