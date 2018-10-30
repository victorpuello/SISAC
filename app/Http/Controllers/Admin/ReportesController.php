<?php

namespace ATS\Http\Controllers\Admin;

use App;
use ATS\Clases\CurrentAnio;
use ATS\Clases\Reportes\Reporte;
use ATS\Model\Asignatura;
use ATS\Model\Docente;
use ATS\Model\Estudiante;
use ATS\Model\Grado;
use ATS\Model\Grupo;
use ATS\Model\Indicador;
use ATS\Model\Institucion;
use ATS\Model\Periodo;
use Illuminate\Http\Request;
use ATS\Http\Requests\ReportesIndicadoresRequest;
use ATS\Http\Controllers\Controller;
use PDF;

class ReportesController extends Controller
{
    public function index(){
        $periodos = (new CurrentAnio())->pluck_periodos();
        $docentes = Docente::orderBy('name','ASC')->pluck('name','id');
        $asignaturas = Asignatura::pluck('name','id');
        $grados = Grado::pluck('name','id');
        $grupos = grupos_pluck();
        return view('admin.reportes.index',compact('periodos','grupos','docentes','asignaturas','grados'));
    }
    public function reporteAcademico (Request $request){
        $grupo = Grupo::with(['estudiantes.definitivas','estudiantes.inasistencias','estudiantes.grupo.grado','estudiantes.notas.indicador','asignaciones.asignatura.indicadores'])->findOrFail($request->grupo);
        $institucion = Institucion::all()->first();
        $periodo = Periodo::with('anio.periodos')->findOrFail($request->periodo);
        $reporte = new Reporte($grupo);
        $pdf = PDF::loadView('admin.reportes.print.informeEstudiante', compact('reporte','institucion','grupo','periodo'))
                    ->setPaper('legal')
                    ->setOrientation('portrait')
                    ->setOption('margin-bottom', 15)
                    ->setOption('encoding', 'UTF-8');
        return $pdf->download('Informe'.$grupo->name_aula.''.$periodo->name.''.'.pdf');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function  sabana(Request $request){
        $institucion = Institucion::first();
        $periodo = Periodo::findOrFail($request->periodo);
        $grupo = Grupo::where('id','=', $request->grupo)->with('estudiantes.definitivas')->first();
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
     * @param ReportesIndicadoresRequest $request
     * @return \Illuminate\Http\Response
     */
    public function reporteLogros (ReportesIndicadoresRequest $request){
        $docente = Docente::with(['indicadores.grado','indicadores.asignatura','indicadores.periodo'])->findOrFail($request->docente);
//        dd($docente);
        $institucion = Institucion::first();
        $indicadores = $docente->indicadores->where('periodo_id',$request->periodo)->where('asignatura_id',$request->asignatura)->where('grado_id',$request->grade);
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
