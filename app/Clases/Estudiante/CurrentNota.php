<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 7/10/2018
 * Time: 11:32 AM
 */

namespace ATS\Clases\Estudiante;


use ATS\Clases\Indicador\IndicadoresPlanilla;
use ATS\Model\Asignatura;
use ATS\Model\Estudiante;
use ATS\Model\Indicador;
use ATS\Model\Nota;
use ATS\Model\Periodo;
use ATS\Model\Planilla;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Not;
use PhpParser\Node\Expr\Array_;

class CurrentNota
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
     * @var \ATS\Model\Planilla
     */
    protected $planilla;
    /**
     * @var \ATS\Model\Nota
     */
    protected $notas;
     public function __construct (Estudiante $estudiante, Planilla $planilla)
     {
         $this->periodo = $planilla->periodo;
         $this->planilla = $planilla;
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
    private function prom (Asignatura $asignatura, String $category){
        $categorias = Config::get('institucion.indicadores.categorias');
        $indicadores = new IndicadoresPlanilla($this->planilla);
        $notas = $this->notasIndicadores($indicadores->getIndicadoresCategory($category));
        $value = 0;
        foreach ($notas as $nota){
            $value += $nota->score;
        }
        $porcentaje = 0;
        switch ($category){
            case 'cognitivo':
                $porcentaje =$categorias[0]['porcentaje'];
                break;
            case 'actitudinal':
                $porcentaje =$categorias[2]['porcentaje'];
                break;
            case 'procedimental':
                $porcentaje =$categorias[1]['porcentaje'];
                break;
            default:break;
        }
        return $value * $porcentaje;
    }

    public function scoreDef(Asignatura $asignatura){
        $categorias = Config::get('institucion.indicadores.categorias');
        $score = 0;
        foreach ($categorias as $categoria){
            $score += $this->prom($asignatura,$categoria['name']);
        }
        return $score;
    }

    /**
     * @return \ATS\Nota[]|\Illuminate\Database\Eloquent\Collection
     */
    public function notasPeriodo (){
        return $this->notas;
     }

    /**
     * @param Int $id
     * @return \ATS\Model\Nota
     */
    public function getNota(Int $id){
        return $this->notas->where('id','=',$id)->first();
     }

    /**
     * @param Nota $nota
     * @param array $atributes
     */
    public function updateNota(Nota $nota, Array $atributes):void {
        $nota->update($atributes);
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

