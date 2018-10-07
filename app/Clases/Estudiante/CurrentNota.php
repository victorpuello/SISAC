<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 7/10/2018
 * Time: 11:32 AM
 */

namespace ATS\Clases\Estudiante;


use ATS\Model\Asignatura;
use ATS\Model\Estudiante;
use ATS\Model\Indicador;
use ATS\Model\Nota;
use ATS\Model\Periodo;

class CurrentNota
{
    protected $estudiante;
    protected $periodo;
    protected $notas;
     public function __construct (Estudiante $estudiante, Periodo $periodo)
     {
         $this->periodo = $periodo;
         $this->estudiante = $estudiante;
         $this->notas = $estudiante->notas->where('periodo_id','=',$this->periodo->id);
     }

    /**
     * @param Indicador $indicador
     * @return Nota
     */
    public function singleNote (Indicador $indicador){
        $notas = $this->estudiante->notas->where('periodo_id','=',$this->periodo->id);
        return $notas->where('indicador_id','=',$indicador->id)->first();
    }

    /**
     * @return \ATS\Nota[]|\Illuminate\Database\Eloquent\Collection
     */
    public function notasPeriodo (){
        return $this->notas;
     }


    /**
     * @param array $indicadores
     * @return \Illuminate\Support\Collection
     */
    public function notasIndicadores($indicadores){
        $notas = collect();
        foreach ($indicadores as $indicador){
            if (! is_null($this->singleNote($indicador))){
                $nota = $this->singleNote($indicador);
                $nota->setAttribute('category',$indicador->category);
                $notas->push($nota);
            }
        }
        return $notas;
     }
}

