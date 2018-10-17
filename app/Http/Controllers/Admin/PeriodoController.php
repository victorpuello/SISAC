<?php

namespace ATS\Http\Controllers\Admin;


use ATS\Model\Periodo;
use Illuminate\Http\Request;
use ATS\Http\Controllers\Controller;
class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo::with('anio')->orderBy('anio_id','DESC')->get();
        return view('admin.periodos.index',compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.periodos.ajax.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodo = Periodo::create($request->all());
        return redirect()->route('periodos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodo $periodo)
    {
        return view('admin.periodos.ajax.edit',compact('periodo'));
    }


    /**
     * @param Request $request
     * @param Periodo $periodo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Periodo $periodo)
    {
        $periodo->update($request->all());
        return redirect()->action('Admin\PeriodoController@index');
    }

    /**
     * @param Periodo $periodo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Periodo $periodo)
    {
        $periodo->delete();
        return redirect()->route('periodos.index');
    }
}
