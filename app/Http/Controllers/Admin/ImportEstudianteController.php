<?php

namespace ATS\Http\Controllers\Admin;

use ATS\Imports\EstudianteImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use ATS\Estudiante;
use ATS\Http\Controllers\Controller;

class ImportEstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.import.importestudiantes');
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('archivo');
        Excel::import(new EstudianteImport,$file,null,\Maatwebsite\Excel\Excel::XLSX);
        return view('admin.import.importestudiantes');
    }

}
