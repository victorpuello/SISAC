<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 7/10/2018
 * Time: 1:08 PM
 */

namespace ATS\Clases\Indicador;


use ATS\Model\Indicador;
use ATS\Model\Planilla;
use Illuminate\Support\Collection;

class IndicadoresPlanilla
{
    protected $planilla;
    protected $docente;
    protected $asignatura;
    protected $grado;
    protected $periodo;
    protected $indicadores;

    /**
     * IndicadoresPlanilla constructor.
     * @param Planilla $planilla
     */
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
     * @return Collection
     */
    public function getIndicadores(){
        return $this->indicadores->where('asignatura_id','=',$this->asignatura->id);
    }


    /**
     * @param String $category
     * @param String $nivel
     * @return mixed
     */
    public function getIndicadorCategoryNivel(String $category, String $nivel){
        $indicadores = $this->getIndicadores();
        return $indicadores->where('category','=',$category)->where('indicator','=',$nivel)->first();
    }

    /**
     * @param String $category
     * @return Collection
     */
    public function getIndicadoresCategory(String $category){
        $indicadores = $this->getIndicadores();
        return $indicadores->where('category','=',$category);
    }

    /**
     * @return int
     */
    public function countInd(){
        return count($this->indicadores->where('asignatura_id','=',$this->asignatura->id));
    }

    /**
     * @return int
     */
    public function countCognitivos(){
        return count($this->getIndicadores()->where('category','=','cognitivo'));
    }

    /**
     * @return int
     */
    public function countProcedimentales(){
        return count($this->getIndicadores()->where('category','=','procedimental'));
    }

    /**
     * @return int
     */
    public function countActitudinales(){
        return count($this->getIndicadores()->where('category','=','actitudinal'));
    }

}