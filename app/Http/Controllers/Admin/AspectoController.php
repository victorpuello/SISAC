<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Clases\CurrentAnio;
use ATS\Http\Requests\CreateAspectoRequest;
use ATS\Http\Requests\UpdateAspectoRequest;
use ATS\Model\Aspecto;
use ATS\Transformers\AspectosTransformer;
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;

class AspectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $aspectos = Aspecto::orderBy('category','ASC');
        if ($request->ajax()){
            return datatables()->eloquent($aspectos)->setTransformer(new AspectosTransformer())->smart(true)->toJson();
        }
        return view('admin.aspectos.index',compact('aspectos'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $periodos = (new CurrentAnio())->pluck_periodos();
        return view('admin.aspectos.ajax.create',compact('periodos'));
    }

    /**
     * @param CreateAspectoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAspectoRequest $request)
    {
        Aspecto::create($request->all());
        return redirect()->route('aspectos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * @param Aspecto $aspecto
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Aspecto $aspecto)
    {
        return view('admin.aspectos.ajax.edit',compact('aspecto'));
    }


    /**
     * @param UpdateAspectoRequest $request
     * @param Aspecto $aspecto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAspectoRequest $request, Aspecto $aspecto)
    {
        $aspecto->update($request->all());
        return redirect()->route('aspectos.index');
    }


    /**
     * @param Aspecto $aspecto
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Aspecto $aspecto)
    {
        $aspecto->delete();
        return redirect()->route('aspectos.index');
    }
}
