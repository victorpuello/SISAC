<?php

namespace Ngsoft\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index(){
        return view('admin.reportes.index');
    }
}
