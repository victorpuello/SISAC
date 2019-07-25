<?php

namespace ATS\Http\Controllers\Admin;


use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\CreateIndicadorRequest;
use ATS\Http\Requests\UpdateIndicadorRequest;
use ATS\Model\Anio;
use ATS\Model\Asignatura;
use ATS\Model\Docente;
use ATS\Model\Grado;
use ATS\Model\Indicador;
use ATS\Model\Periodo;
use ATS\Transformers\IndicadorTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $indicadores = Indicador::with(['grado','asignatura','periodo','docente']);
        if ($request->ajax()){
            return datatables()->eloquent($indicadores)->setTransformer(new IndicadorTransformer())->smart(true)->toJson();
        }
        return view('admin.indicadores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::now();
        $anio = Anio::where('name',$date->year)->with('periodos')->first();
        $grados = Grado::orderBy('numero','ASC')->pluck('name','id');
        $asignaturas = Asignatura::orderBy('name','ASC')->pluck('name','id');
        $periodos = $anio->periodos->pluck('name','id');
        $docentes = Docente::orderBy('name','ASC')->pluck('name','id');
        return view('admin.indicadores.ajax.create',compact('grados','asignaturas','periodos','docentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateIndicadorRequest $request)
    {
        $indicador = new Indicador($request->all());
        try {
            $indicador->save();
        }
        catch (\Exception $e) {
            $data = array(['msg'=>'El indicador presenta duplicidad','status'=>true]); ;
            return view('admin.indicadores.index',compact('data'));
        }
        return redirect()->route('indicadors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function show(Indicador $indicador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicador $indicador)
    {
        $grados = Grado::pluck('name','id');
        $asignaturas = Asignatura::pluck('name','id');
        $periodos = Periodo::pluck('name','id');
        $docentes = Docente::pluck('name','id');
        return view('admin.indicadores.ajax.edit',compact('grados','asignaturas','periodos','docentes','indicador'));
    }

    /**
     * @param UpdateIndicadorRequest $request
     * @param Indicador $indicador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateIndicadorRequest $request, Indicador $indicador)
    {
        try {
            $indicador->update($request->all());
        }
        catch (\Exception $e) {
            $data = array(['msg'=>'El indicador presenta duplicidad','status'=>true]); ;
            return view('admin.indicadores.index',compact('data'));
        }
        return redirect()->route('indicadors.index');
    }

    /**
     * @param Indicador $indicador
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Indicador $indicador)
    {
        $indicador->delete();
        return redirect()->route('indicadors.index');
    }
}
