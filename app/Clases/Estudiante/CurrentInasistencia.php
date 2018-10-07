<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 7/10/2018
 * Time: 4:03 PM
 */

namespace ATS\Clases\Estudiante;


use ATS\Model\Asignatura;
use ATS\Model\Estudiante;
use ATS\Model\Periodo;

class CurrentInasistencia
{
    protected $estudiante;
    protected $periodo;
    protected $inasistencias;

    /**
     * CurrentInasistencia constructor.
     * @param Estudiante $estudiante
     * @param Periodo $periodo
     */
    public function __construct (Estudiante $estudiante, Periodo $periodo)
    {
        $this->periodo = $periodo;
        $this->estudiante = $estudiante;
        $this->inasistencias = $estudiante->inasistencias->where('periodo_id','=',$this->periodo->id);
    }

    /**
     * @param Asignatura $asignatura
     * @return mixed
     */
    public function singleInasistencia (Asignatura $asignatura){
        return $this->inasistencias->where('asignatura_id','=',$asignatura->id)->first();
    }

    /**
     * @return \ATS\Inasistencia[]|\Illuminate\Database\Eloquent\Collection
     */
    public function inasistenciasPeriodo (){
        return $this->inasistencias;
    }
}