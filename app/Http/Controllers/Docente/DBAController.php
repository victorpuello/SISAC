<?php

namespace ATS\Http\Controllers\Docente;

use ATS\Model\DBA;
use ATS\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DBAController extends Controller
{
    protected $docente;
    public function __construct ()
    {
        $this->middleware(function ($request, $next) {
            $this->docente= Auth::user()->docente;
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->docente->load(['asignaciones.asignatura.area','asignaciones.grupo.grado']);
        $dbas = collect();
        if (!is_null($request->grado_id) || !is_null($request->area_id)){
            return DBA::where('area_id',$request->area_id)->where('grado_id',$request->grado_id)->with('sugerencias')->get();
        }
        foreach ($this->docente->asignaciones as $asignacion){
            $_dbas = DBA::where('area_id',$asignacion->asignatura->area->id)->where('grado_id',$asignacion->grupo->grado->id)->with('sugerencias')->get();
            foreach ($_dbas as $dba){
                $dbas->push($dba);
            }
        }
      return $dbas->unique()->sortBy('area_id');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\DBA  $dBA
     * @return \Illuminate\Http\Response
     */
    public function show(DBA $dBA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\DBA  $dBA
     * @return \Illuminate\Http\Response
     */
    public function edit(DBA $dBA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ATS\DBA  $dBA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DBA $dBA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\DBA  $dBA
     * @return \Illuminate\Http\Response
     */
    public function destroy(DBA $dBA)
    {
        //
    }
}
