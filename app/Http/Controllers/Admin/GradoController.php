<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Model\Grado;
use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\CreateGradoRequest;
use ATS\Http\Requests\UpdateGradoRequest;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $grados = Grado::all();
        return view('admin.grados.index',compact('grados'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.grados.ajax.create');
    }

    /**
     * @param CreateGradoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateGradoRequest $request)
    {
        $grado = new Grado($request->all());
        $grado->save();
        return redirect()->route('grados.index');
    }

    /**
     * @param Grado $grado
     */
    public function show(Grado $grado)
    {
        return view('admin.grados.show',compact('grado'));
    }

    /**
     * @param Grado $grado
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Grado $grado)
    {
       return view('admin.grados.ajax.edit',compact('grado'));
    }

    /**
     * @param UpdateGradoRequest $request
     * @param Grado $grado
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateGradoRequest $request, Grado $grado)
    {
        $grado->update($request->all());
        return redirect()->route('grados.index');
    }

    /**
     * @param Grado $grado
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Grado $grado)
    {
        $grado->delete();
        return redirect()->route('grados.index');
    }
}
