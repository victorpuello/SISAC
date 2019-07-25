<?php

namespace ATS\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ATS\Docente;
use ATS\Logro;
use ATS\Periodo;
use ATS\Http\Controllers\Controller;


class FindNotesController extends Controller
{
    public function __invoke (Request $request)
    {
        //dd($request->all());
        $periodo = $request->periodo;
        $docente = $request->user()->docente->id;
        $grado = $request->grado;
        $asignatura = $request->asignatura;
        $user = $request->user()->type;
        switch ($user){
            case 'admin':
                $logros = Logro::all();

                break;
            case 'coordinador':
                break;
            case 'docente':
                $logros = DB::table('logros')->where([
                    ['periodo_id','=',$periodo],
                    ['docente_id','=',$docente],
                    ['asignatura_id','=',$asignatura],
                    ['grade','=',$grado]
                ])->get();
               return view('admin.logros.index',compact('logros'))->with($this->getDataSearch($docente))->withInput($request->all());
                break;
            case 'secretaria':
                break;
            default:break;
        }
    }

    public function getDataSearch ($docente)
    {
        $periodos = Periodo::pluck('name', 'id');
        $doc = Docente::find($docente);
        $salones = $doc->salones;
        $grados = [];
        foreach ($salones as $key => $salon) {
            $grados[$salon->grade] = $salon->getNameGradeAttibute();
        }
        $grados = array_unique($grados);
        $asignaturas = $doc->asignaturas->pluck('name', 'id');
        return compact('periodos','asignaturas','grados');
    }
}
