<?php

namespace Ngsoft\Http\Controllers\Docente;

use Illuminate\Support\Facades\Auth;
use Ngsoft\Logro;
use Ngsoft\Http\Controllers\Controller;
use PDF;

class ReportesController extends Controller
{
    public function index(){
        return view('docente.reportes.index');
    }
    public function reporteLogros (){
        $logros = Logro::where('docente_id','=',Auth::user()->docente->id)
            ->with('asignatura')
            ->with('docente')
            ->with('periodo')
            ->orderBy('grade','desc')
            ->get();
        $pdf = PDF::loadView('docente.reportes.print.logrosreport',compact('logros'))
            ->setPaper('legal')
            ->setOrientation('portrait')
            ->setOption('margin-bottom', 10)
            ->setOption('encoding', 'UTF-8');

        return $pdf->stream('Reporte_Logros_Docente.pdf');
     // return view('docente.reportes.print.logrosreport',compact('logros'));
    }
}
