<?php


namespace ATS\Clases\Estudiante;


use ATS\Model\Asignatura;
use ATS\Model\Estudiante;
use ATS\Model\Periodo;

class DefinitivaAsignatura
{
    /**
     * @var \ATS\Model\Estudiante
     */
    protected  $estudiante;
    /**
     * @var \ATS\Model\Asignatura
     */
    protected  $asignatura;
    /**
     * @var \ATS\Model\Periodo
     */
    protected $periodo;

    protected $notas;

    public function __construct(Estudiante $estudiante,Asignatura $asignatura, Periodo $periodo)
    {
        $this->estudiante = $estudiante;
        $this->asignatura = $asignatura;
        $this->periodo = $periodo;
        $this->notas = $this->estudiante->notas->where('periodo_id','=',$this->periodo->id)->where('asignatura_id','=',$this->asignatura->id)->take(3);
    }
    //retorna def para asignaturas
    public function getDef(){
        $score = 0;
        foreach ($this->notas as $nota){
            $score += score($nota);
        }
        return $score;
    }
    public function getNotas(){
        return $this->notas;
    }
    public function getIndicador(){
        return indicador($this->getDef());
    }
}
