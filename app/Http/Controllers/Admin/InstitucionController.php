<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Http\Requests\CreateInstitucionRequest;
use ATS\Http\Requests\UpdateInstitucionRequest;
use ATS\Model\Institucion;
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;

class InstitucionController extends Controller
{
    public function index()
    {
        $institucion = Institucion::first();
        return view('admin.institucion.index',compact('institucion'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.institucion.ajax.create');
    }

    /**
     * @param CreateInstitucionRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(CreateInstitucionRequest $request)
    {
        $institucion = Institucion::create($request->all());
        return view('admin.institucion.index',compact('institucion'));
    }

    /**
     * @param Institucion $institucion
     */
    public function show(Institucion $institucion)
    {

    }

    /**
     * @param Institucion $institucion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Institucion $institucion)
    {
        return view('admin.institucion.edit',compact('institucion'));
    }

    /**
     * @param UpdateInstitucionRequest $request
     * @param Institucion $institucion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(UpdateInstitucionRequest $request, Institucion $institucion)
    {
        $institucion->update($request->all());
        return redirect()->route('institucions.index');
    }

    public function destroy(Institucion $institucion)
    {
        //
    }
}
