<?php


namespace ATS\Clases\Estudiante;


use ATS\Clases\SIE;
use ATS\Model\Area;
use ATS\Model\Asignatura;
use ATS\Model\Estudiante;
use ATS\Model\Periodo;

class DefinitivaArea
{
    /**
     * @var Estudiante
     */
    private $estudiante;
    /**
     * @var Area
     */
    private $area;
    /**
     * @var Periodo
     */
    private $periodo;
    protected $grado;
    protected  $sie;
    public function __construct(Estudiante $estudiante, Area $area, Periodo $periodo){

        $this->estudiante = $estudiante;
        $this->area = $area;
        $this->periodo = $periodo;
        $this->sie = new SIE($this->estudiante->grupo);
        $this->grado = $this->estudiante->grupo->grado;
    }

    public function getDefArea(){
        $asignaturas = $this->sie->getAsignaturasArea($this->grado,$this->area);
        $score = 0;
        foreach ($asignaturas as $asignatura){
            $defAsg = new DefinitivaAsignatura($this->estudiante,$asignatura,$this->periodo);
            $score += $defAsg->getDef() * $this->sie->porcentajeAsignatura($this->grado,$asignatura);
        }
        return $score;
    }


}
