<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 7/10/2018
 * Time: 1:08 PM
 */

namespace ATS\Clases\Indicador;


use ATS\Model\Planilla;

class IndicadoresPlanilla
{
    protected $planilla;
    protected $docente;
    protected $asignatura;
    protected $grado;
    protected $periodo;
    protected $indicadores;
    public function __construct (Planilla $planilla)
    {
        $this->planilla = $planilla;
        $this->docente = $planilla->asignacion->docente;
        $this->asignatura = $planilla->asignacion->asignatura;
        $this->grado = $planilla->asignacion->grupo->grado;
        $this->periodo = $planilla->periodo;
        $this->indicadores = $this->docente->indicadores->where('periodo_id','=',$this->periodo->id)->where('grado_id','=',$this->grado->id);
    }

    /**
     * @return mixed
     */
    public function getIndicadores(){
        return $this->indicadores->where('asignatura_id','=',$this->asignatura->id);
    }

}