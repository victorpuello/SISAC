<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 31/10/2018
 * Time: 12:43 AM
 */

namespace ATS\Clases\Estudiante;


use ATS\Clases\CurrentAnio;
use ATS\Clases\CurrentPeriodo;
use ATS\Model\Estudiante;
use ATS\Model\Periodo;

class CurrentObservaciones
{
    /**
     * @var \ATS\Model\Estudiante
     */
    protected $estudiante;
    /**
     * @var \ATS\Model\Periodo
     */
    protected $periodo;
    /**
     * @var \ATS\Model\Observacion
     */
    protected $observaciones;

    public function __construct (Estudiante $estudiante)
    {
        $this->periodo = (new CurrentPeriodo())->getPeriodo();
        $this->estudiante = $estudiante;
        $this->observaciones = $estudiante->observaciones->where('periodo_id','=',$this->periodo->id);
    }
    public function getAcademicas(){
        $orservaciones = collect();
        foreach ($this->observaciones as $observacion){
            if ($observacion->aspecto->category === 'academico'){
                $orservaciones->push($observacion);
            }
        }
        return $orservaciones;
    }
    public function getConvivencias(){
        $orservaciones = collect();
        foreach ($this->observaciones as $observacion){
            if ($observacion->aspecto->category === 'convivencia'){
                $orservaciones->push($observacion);
            }
        }
        return $orservaciones;
    }
    public function getObservaciones(){
        return $this->observaciones;
    }
    public function countObservaciones(){
        return count($this->observaciones);
    }
    /**
     * @return Periodo
     */
    public function getPeriodo (): Periodo
    {
        return $this->periodo;
    }

    public function getNamePeriodo () {
        return $this->periodo->name.' - '.$this->periodo->anio->name;
    }


}