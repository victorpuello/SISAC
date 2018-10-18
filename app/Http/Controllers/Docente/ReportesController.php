<?php

namespace ATS\Http\Controllers\Docente;

use Illuminate\Http\Request;
use ATS\Clases\Reportes\Reporte;
use Illuminate\Support\Facades\Auth;
use ATS\Model\{Asignatura,Grado,Periodo,Grupo,Institucion,Docente};
use ATS\Http\Controllers\Controller;
use PDF;
use ATS\Clases\CurrentAnio;

class ReportesController extends Controller
{
    /**
     * @var Docente
     */
    private $docente;

    public function __construct (Request $request)
    {
        $this->middleware(function ($request, $next) {
            $this->docente= Auth::user()->docente;
            return $next($request);
        });
    }
    public function index(){
        $this->docente->load(['asignaciones.asignatura','asignaciones.grupo.grado',]);
        $asg = collect();
        $gds = collect();
        $gps = collect();
        foreach ($this->docente->asignaciones as $asignacion){
            $asg->push($asignacion->asignatura);
            $gds->push($asignacion->grupo->grado);
            $gps->push($asignacion->grupo);

        }
        $grados = $gds->unique()->sortBy('numero')->pluck('name','id');
        $asignaturas = $asg->unique()->sortBy('name')->pluck('name','id');
        $grupos = $gps->unique()->sortBy('name')->pluck('name','id');
        $periodos = (new CurrentAnio())->pluck_periodos();
        $docente = $this->docente;
        return view('docente.reportes.index',compact('periodos','grupos','docente','asignaturas','grados'));
    }
    public function  sabana(Request $request){
        $institucion = Institucion::first();
        $periodo = Periodo::findOrFail($request->periodo);
        $grupo = $this->docente->grupo_director;
        $grupo->load(['asignaciones.asignatura']);
        $reporte = new Reporte($grupo);
        $pdf = PDF::loadView('admin.reportes.print.sabana', compact('reporte','periodo','institucion'))
            ->setPaper('legal')
            ->setOption('footer-html',\View::make('admin.reportes.partials.footer'))
            ->setOption('footer-right','Pag. [page] de [toPage]')
            ->setOption('footer-font-size',7)
            ->setOrientation('landscape')
            ->setOption('margin-bottom', 10)
            ->setOption('encoding', 'UTF-8');
        return $pdf->download('Sabana_'.$grupo->name_aula.'_'.$periodo->name.''.'.pdf');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function reporteLogros (Request $request){
        $this->docente->load(['indicadores.grado','indicadores.asignatura','indicadores.periodo']);
        $institucion = Institucion::first();
        $indicadores = $this->docente->indicadores->where('periodo_id',$request->periodo)->where('asignatura_id',$request->asignatura)->where('grado_id',$request->grade);
        $docente = $this->docente;
        $pdf = PDF::loadView('admin.reportes.print.logrosreport',compact('indicadores','docente','institucion'))
            ->setPaper('legal')
            ->setOption('footer-html',\View::make('admin.reportes.partials.footer'))
            ->setOption('footer-right','Pag. [page] de [toPage]')
            ->setOption('footer-font-size',7)
            ->setOrientation('portrait')
            ->setOption('margin-bottom', 10)
            ->setOption('encoding', 'UTF-8');
        return $pdf->download('Reporte_Logros_'.''.$docente->name.'.pdf');
    }
}
