<?php

namespace ATS\Http\Controllers\Admin;

use App;
use Illuminate\Http\Request;
use ATS\Asignatura;
use ATS\Docente;
use ATS\Estudiante;
use ATS\Http\Requests\ReportesLogrosRequest;
use ATS\Institucion;
use ATS\Logro;
use ATS\Periodo;
use ATS\Grupo;
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
        $periodos = Periodo::pluck('name','id');
        $docentes = Docente::pluck('name','id');
        $asignaturas = Asignatura::pluck('name','id');
        $grados = ['0' => 'Pre-Escolar', '1' => 'Primero', '2' => 'Segundo', '3' => 'Tercero', '4' => 'Cuarto', '5' => 'Quinto', '6' => 'Sexto', '7' => 'Septimo', '8' => 'Octavo', '9' => 'Noveno', '10' => 'Decimo', '11' => 'Once'];
        $sal= collect();
        foreach ($this->salones_todos as $salon){
            $sal->push([
                'id'=>$salon->id,
                'nombre'=>$salon->full_name,
                'grado'=>$salon->grade,
            ]);
        }
        $salones = $sal->sortBy('grado')->pluck('nombre','id');
        return view('admin.reportes.index',compact('periodos','salones','docentes','asignaturas','grados'));
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
    public function reporteLogros (ReportesLogrosRequest $request){
        $docente = Docente::find($request->docente);
        $periodo = Periodo::find($request->periodo);
        $asignatura = Asignatura::find($request->asignatura);
        $grado = $request->grade;
        $logros = Logro::where('docente_id','=',$request->docente)
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
