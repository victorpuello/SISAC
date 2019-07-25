<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Http\Controllers\Controller;
use ATS\Model\Anio;
use Illuminate\Http\Request;

class AnioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param Anio $anio
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Anio $anio)
    {
        return response()->json($anio->periodos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Anio  $anios
     * @return \Illuminate\Http\Response
     */
    public function edit(Anio $anios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ATS\Anio  $anios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anio $anios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Anio  $anios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anio $anios)
    {
        //
    }
}
