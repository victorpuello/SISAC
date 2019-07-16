<?php

namespace ATS\Http\Controllers\Secretaria;

use App;
use Illuminate\Http\Request;
use ATS\Model\{Asignatura,Docente,Estudiante,Institucion,Indicador,Periodo,Grupo};
use ATS\Http\Requests\ReportesIndicadoresRequest;
use ATS\Http\Controllers\Controller;
use PDF;

class ReportesController extends Controller
{
    private $salones_todos;
    public function __construct ()
    {
        $this->salones_todos = Grupo::orderBy('name','ASC')->get();
    }
    public function index(){

        return view('secretaria.reportes.index');
    }
    public function reporteAcademico (Request $request){
        $aula = Grupo::find($request->salon);
        $institucion = Institucion::all()->first();
        $periodos = Periodo::all();
        $periodo = $periodos->where('id','=',$request->periodo)->first();
        $estudiantes = Estudiante::with('notas')
            ->with('definitivas')
            ->with('inasistencias')
            ->with('salon')
            ->orderBy('lastname','ASC')
            ->where('salon_id','=',$aula->id)
            ->where('stade','=','activo')
            //->take(10)
            ->get();
        $puesto = 0;
        foreach ($estudiantes as $estudiante){
            $_count = 0;

            $_nasg = count($estudiante->definitivas->where('periodo_id','=',$periodo->id));
            foreach ($estudiante->definitivas->where('periodo_id','=',$periodo->id) as $definitiva){
                $_count += $definitiva->score;
            }
            $estudiante->setAttribute('scoreTotal',($_count/$_nasg));

        }
        foreach ($estudiantes->sortByDesc('scoreTotal') as $estudiante){
            $puesto += 1;
            $estudiante->setAttribute('puesto',$puesto);
        }
        $pdf = PDF::loadView('admin.reportes.print.informeEstudiante', compact('estudiantes','institucion','salon','periodo','periodos'))
                    ->setPaper('legal')
                    ->setOrientation('portrait')
                    ->setOption('margin-bottom', 15)
                    ->setOption('encoding', 'UTF-8');

        //return view('admin.reportes.print.informeEstudiante',compact('estudiantes','institucion','salon','periodo','periodos'));
        return $pdf->download('Informe'.$aula->full_name.''.$periodo->name.''.'.pdf');
    }

    public function  sabana(Request $request){
        $periodo = Periodo::findOrFail($request->periodo);
        $salon = Grupo::where('id','=', $request->salon)->with('estudiantes')->first();
        $numero = 0;
        foreach ($salon->estudiantes->sortBy('lastname') as $estudiante){
            $numero += 1;
            $estudiante->setAttribute('numero',$numero);
        }
       // return view('admin.reportes.print.sabana', compact('salon','periodo'));
        $pdf = PDF::loadView('admin.reportes.print.sabana', compact('salon','periodo'))
            ->setPaper('legal')
            ->setOrientation('landscape')
            ->setOption('margin-bottom', 10)
            ->setOption('encoding', 'UTF-8');
        return $pdf->download('Sabana_'.$salon->full_name.'_'.$periodo->name.''.'.pdf');

    }
    public function reporteLogros (ReportesIndicadoresRequest $request){
        $docente = Docente::find($request->docente);
        $periodo = Periodo::find($request->periodo);
        $asignatura = Asignatura::find($request->asignatura);
        $grado = $request->grade;
        $logros = Indicador::where('docente_id','=',$request->docente)
            ->where('periodo_id','=',$request->periodo)
            ->where('asignatura_id','=',$request->asignatura)
            ->where('grade','=',$request->grade)
            ->get();
        $pdf = PDF::loadView('admin.reportes.print.logrosreport',compact('logros','docente','periodo','asignatura','grado'))
            ->setPaper('legal')
            ->setOrientation('portrait')
            ->setOption('margin-bottom', 10)
            ->setOption('encoding', 'UTF-8');
        return $pdf->download('Reporte_Logros_'.''.$docente->name.'.pdf');
    }

}
