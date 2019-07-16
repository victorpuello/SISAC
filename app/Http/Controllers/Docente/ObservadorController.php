<?php

namespace ATS\Http\Controllers\Docente;

use Illuminate\Http\Request;
use ATS\Clases\CurrentAnio;
use ATS\Http\Controllers\Controller;
use ATS\Model\Estudiante;
use ATS\Clases\Estudiante\CurrentObservaciones;

class ObservadorController extends Controller
{
    public function __invoke(Estudiante $estudiante){
        $periodos = (new CurrentAnio())->periodos();
        $estudiante->load(['observaciones.aspecto']);
//        dd($estudiante);
        $observaciones = new CurrentObservaciones($estudiante);
        return view('docente.observador.index', compact('estudiante','periodos','observaciones'));
    }
}
