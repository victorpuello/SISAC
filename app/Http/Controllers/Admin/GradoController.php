<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Grado;
use ATS\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::all();
        return view('admin.grados.index',compact('grados'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show(Grado $grado)
    {
        dd($grado);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
