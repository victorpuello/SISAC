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

class CurrentDefinitiva
{
    protected $estudiante;
    protected $periodo;
    protected $definitivas;

    public function __construct (Estudiante $estudiante, Periodo $periodo)
    {
        $this->periodo = $periodo;
        $this->estudiante = $estudiante;
        $this->definitivas = $estudiante->definitivas->where('periodo_id','=',$periodo->id);
    }
    /**
     * @param Asignatura $asignatura
     * @return Definitiva
     */
    public function singleDefinitivaAsignatura (Asignatura $asignatura){
        return $this->definitivas->where('asignatura_id','=',$asignatura->id)->first();
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
}