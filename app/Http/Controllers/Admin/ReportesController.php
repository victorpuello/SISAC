<?php

namespace Ngsoft\Http\Controllers\Admin;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Ngsoft\Estudiante;
use Ngsoft\Institucion;
use Ngsoft\Periodo;
use Ngsoft\Salon;
use Ngsoft\Transformers\EstudianteTransformer;
use Ngsoft\Http\Controllers\Controller;
use PDF;

class ReportesController extends Controller
{
    private $salones_todos;
    public function __construct ()
    {
        $this->salones_todos = Salon::orderBy('name','ASC')->get();
    }
    public function index(){
        $periodos = Periodo::pluck('name','id');
        $sal= collect();
        foreach ($this->salones_todos as $salon){
            $sal->push([
                'id'=>$salon->id,
                'nombre'=>$salon->full_name,
                'grado'=>$salon->grade,
            ]);
        }
        $salones = $sal->sortBy('grado')->pluck('nombre','id');
        return view('admin.reportes.index',compact('periodos','salones'));
    }
    public function reporteAcademico (Periodo $periodo, Salon $aula){
        $institucion = Institucion::all()->first();
        $periodos = Periodo::all();
        $estudiantes = Estudiante::with('notas')
            ->with('definitivas')
            ->with('inasistencias')
            ->with('salon')
            ->orderBy('lastname','ASC')
            ->where('salon_id','=',$aula->id)
            ->where('stade','=','activo')
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
                    ->setOption('margin-bottom', 10)
                    ->setOption('encoding', 'UTF-8');

       return $pdf->stream('Informe.pdf');
       // return view('admin.reportes.print.informeEstudiante',compact('estudiantes','institucion','salon','periodo','periodos'));
    }

    public function  sabana(Request $request){
        $periodo = Periodo::findOrFail($request->periodo);
        $salon = Salon::where('id','=', $request->salon)->with('estudiantes')->first();
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

        return $pdf->stream('Sabana'.$salon->name.''.$periodo.''.'.pdf');
       // return view('admin.reportes.print.sabana',compact('salon','periodo'));
    }
}
