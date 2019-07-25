<?php

namespace ATS\Exceptions;

use ATS\Clases\Indicador\IndicadoresPlanilla;
use Exception;

class IndicadoresException extends Exception
{
    public function render($request){
        $indicadores = new IndicadoresPlanilla($request->planilla);
        return response()->view('errors.indicadores',array('exception'=>$this,'indicadores'=> $indicadores));
    }
}
