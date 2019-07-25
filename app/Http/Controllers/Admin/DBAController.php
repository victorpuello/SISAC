<?php

namespace ATS\Http\Controllers\Admin;

use ATS\DBA;
use ATS\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DBAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        dd($request->all());
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
