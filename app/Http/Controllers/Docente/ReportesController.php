<?php

namespace Ngsoft\Http\Controllers\Docente;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Ngsoft\Asignatura;
use Ngsoft\Logro;
use Ngsoft\Http\Controllers\Controller;
use Ngsoft\Periodo;
use Ngsoft\Salon;
use PDF;

class ReportesController extends Controller
{
    public function index(){
        $periodos = Periodo::pluck('name','id');
        $docente = Auth::user()->docente;
        $salones = collect();
        $asig = collect();
        foreach ($docente->asignaciones as $asignacion){
            $salones->push($asignacion->salon);
            $asig->push($asignacion->asignatura);
        }
        $asignaturas =  $asig->pluck('name','id')->all();
        $grados = $salones->pluck('grade','grade')->all();
        return view('docente.reportes.index',compact('periodos','grados','asignaturas'));
    }
    public function  sabana(Request $request){
        $periodo = Periodo::findOrFail($request->periodo);
        $sl = Auth::user()->docente->salon_director;
        $salon = Salon::where('id','=', $sl->id)->with('estudiantes')->first();
        $numero = 0;
        foreach ($salon->estudiantes->sortBy('lastname') as $estudiante){
            $numero += 1;
            $estudiante->setAttribute('numero',$numero);
        }
        $pdf = PDF::loadView('admin.reportes.print.sabana', compact('salon','periodo'))
            ->setPaper('legal')
            ->setOrientation('landscape')
            ->setOption('margin-bottom', 10)
            ->setOption('encoding', 'UTF-8');
        return $pdf->download('Sabana_'.$salon->full_name.'_'.$periodo->name.''.'.pdf');
    }
    public function reporteLogros (Request $request){
        $periodo = Periodo::find($request->periodo);
        $asignatura = Asignatura::find($request->asignatura);
        $grado = $request->grade;
        $docente = Auth::user()->docente;
        $logros = Logro::where('docente_id','=',Auth::user()->docente->id)
            ->where('asignatura_id','=', $request->asignatura)
            ->where('periodo_id','=', $request->periodo)
            ->where('grade','=', $request->grade)
            ->get();
        $pdf = PDF::loadView('docente.reportes.print.logrosreport',compact('logros','docente','periodo','asignatura','grado'))
            ->setPaper('legal')
            ->setOrientation('portrait')
            ->setOption('margin-bottom', 10)
            ->setOption('encoding', 'UTF-8');
        return $pdf->download('Reporte_Logros_Docente.pdf');
    }
}
