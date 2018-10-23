<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 9/10/2018
 * Time: 9:33 PM
 */

namespace ATS\Clases\Estudiante;


use ATS\Clases\CurrentAnio;
use ATS\Clases\Indicador\IndicadoresPlanilla;
use ATS\Model\Definitiva;
use ATS\Model\Estudiante;
use ATS\Model\Inasistencia;
use ATS\Model\Indicador;
use ATS\Model\Nota;
use ATS\Model\Planilla;
use Illuminate\Support\Facades\DB;

class VerificadorNotas
{

    protected $planilla;
    protected $estudiantes;
    protected $indicadores;
    protected $categorias;
    protected $periodo;
    protected $periodoFinal;
    protected $asignatura;
    protected $estudiante;

    /**
     * VerificadorNotas constructor.
     * @param Planilla $planilla
     */
    public function __construct (Planilla $planilla)
    {
        $this->planilla = $planilla;
        $this->estudiantes = $planilla->asignacion->grupo->estudiantes->load(['notas','inasistencias']);
        $this->indicadores = new IndicadoresPlanilla($planilla);
        $this->periodo = $this->planilla->periodo;
        $this->asignatura = $this->planilla->asignacion->asignatura;
        $this->categorias = ['0' => 'cognitivo','1' => 'procedimental','2' => 'actitudinal'];
    }
    /**
     * Valida si los estudiantes ya tienen una nota creada para el
     * Indicador que corresponde al nivel Bajo de esta planilla
     *
     */
    public function foundIndicador():void{
        foreach ($this->estudiantes as $estudiante){
            $isFound = false;
            foreach ($this->indicadores->getIndicadores() as $indicador){
                if (count($this->getNotaExist($estudiante,$indicador)) > 0){
                    $isFound = true;
                }
            }
            if (!$isFound){
                $this->estudiante = $estudiante;
                $this->createNotaAndDefinitivaAndInasistencia($this->estudiante);
            }
        }
    }

    /**
     * @param Estudiante $estudiante
     * @param Indicador $indicador
     * @return \ATS\Nota[]|\Illuminate\Database\Eloquent\Collection
     */
    public  function getNotaExist(Estudiante $estudiante, Indicador $indicador) {
        return $estudiante->notas->where('indicador_id',$indicador->id);
    }

    /**
     * @param Estudiante $estudiante
     */
    private function createNotaAndDefinitivaAndInasistencia (Estudiante $estudiante):void {
        $this->periodoFinal = $this->getPeriodoFinal();
        DB::transaction(function (){
            foreach ($this->categorias as $categoria){
                Nota::create([
                    'score' => 1,
                    'estudiante_id' => $this->estudiante->id,
                    'indicador_id' => $this->indicadores->getIndicadorCategoryNivel($categoria,'bajo')->id,
                    'periodo_id' =>$this->periodo->id
                ]);
            }
            Definitiva::create([
                'score' => 1/4,
                'estudiante_id' => $this->estudiante->id,
                'periodo_id' => $this->periodoFinal->id,
                'asignatura_id' => $this->asignatura->id
            ]);
            Definitiva::create([
                'score' => 1,
                'estudiante_id' => $this->estudiante->id,
                'periodo_id' => $this->periodo->id,
                'asignatura_id' => $this->asignatura->id
            ]);
            Inasistencia::create([
                'numero'=> 0,
                'estudiante_id'=> $this->estudiante->id,
                'periodo_id' => $this->periodo->id,
                'asignatura_id' => $this->asignatura->id
            ]);
        });
    }
    public function getPeriodoFinal(){
        $periodos = (new CurrentAnio())->periodos();
        return $periodos->where('isFinal','=',1)->first() ?? 'No hay periodo final';
    }

}