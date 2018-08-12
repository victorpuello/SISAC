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
    public function index(){
        return view('admin.reportes.index');
    }
    public function reporteAcademico (Periodo $periodo, Salon $aula){
        $institucion = Institucion::all()->first();
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
        //$estudiantes = $estudiantes->take(2);
        $pdf = PDF::loadView('admin.reportes.print.informeEstudiante', compact('estudiantes','institucion','salon','periodo'))
                    ->setPaper('legal')
                    ->setOrientation('portrait')
                    ->setOption('margin-bottom', 10)
                    ->setOption('encoding', 'UTF-8');

       return $pdf->stream('Informe.pdf');
       // return view('admin.reportes.print.informeEstudiante',compact('estudiantes','institucion','salon','periodo'));
    }
}
