<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 10/10/2018
 * Time: 10:36 PM
 */

namespace ATS\Clases\Estudiante;


use ATS\Model\Asignatura;
use ATS\Model\Definitiva;
use ATS\Model\Estudiante;
use ATS\Model\Periodo;
use ATS\Clases\CurrentAnio;
use phpDocumentor\Reflection\Types\Integer;

class CurrentDefinitiva
{
    protected $estudiante;
    protected $periodo;
    protected $definitivas;
    protected $periodoFinal;
    protected $definitivasAnio;
    public function __construct (Estudiante $estudiante, Periodo $periodo)
    {
        $this->periodo = $periodo;
        $this->periodoFinal = $this->getPeriodoFinal();
        $this->estudiante = $estudiante;
        $this->definitivas = $estudiante->definitivas->where('periodo_id','=',$periodo->id);
        $this->definitivasAnio = $estudiante->definitivas->where('periodo_id','=',$this->periodoFinal->id);
    }
    /**
     * @param Asignatura $asignatura
     * @return Definitiva
     */
    public function singleDefinitivaAsignatura (Asignatura $asignatura){
        return $this->definitivas->where('asignatura_id','=',$asignatura->id)->first();
    }

    /**
     * @param Asignatura $asignatura
     * @return mixed
     */
    public function singleDefinitivaAnio (Asignatura $asignatura){
        return $this->definitivasAnio->where('asignatura_id','=',$asignatura->id)->first();
    }

    /**
     * @param Int $id
     * @return Definitiva
     */
    public function singleDefinitiva (Int $id){
        return $this->definitivas->where('id','=',$id)->first();
    }

    /**
     * @param Definitiva $definitiva
     * @param array $atributes
     */
    public function updateDefinitiva (Definitiva $definitiva , Array $atributes){
        $definitiva->update($atributes);
    }

    public function getPeriodoFinal(){
        $periodos = (new CurrentAnio())->periodos();
        return $periodos->where('isFinal','=',1)->first() ?? 'No hay periodo final';
    }

    public function getScoreFinal(Asignatura $asignatura, Periodo $periodo,$score){
        $periodos = (new CurrentAnio())->periodos();
        $periodoFinal = $periodos->where('isFinal','=',1)->first();
        $auxPeriodos = $periodos->where('id','<>',$periodo->id)->where('id','<>',$periodoFinal->id);
        $aux = 0;
        foreach ($auxPeriodos as $_periodo){
            $aux += $this->definitivaPeriodoAsignaturaScore($asignatura, $_periodo);
        }
        return ($aux+$score)/4;
    }

    /**
     * @param Asignatura $asignatura
     * @param Periodo $periodo
     * @return Definitiva
     */
    public function definitivaPeriodoAsignatura(Asignatura $asignatura, Periodo $periodo){
        $definitiva = $this->estudiante->definitivas->where('asignatura_id','=',$asignatura->id)->where('periodo_id','=',$periodo->id)->first();
        return $definitiva;
    }

    /**
     * @param Asignatura $asignatura
     * @param Periodo $periodo
     * @return int
     */
    public function definitivaPeriodoAsignaturaScore(Asignatura $asignatura, Periodo $periodo){
        $definitiva = $this->estudiante->definitivas->where('asignatura_id','=',$asignatura->id)->where('periodo_id','=',$periodo->id)->first();
        return $definitiva->score ?? 0;
    }
}