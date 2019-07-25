<?php

namespace ATS\Transformers;

use ATS\Clases\Estudiante\CurrentInasistencia;
use ATS\Clases\Estudiante\CurrentNota;
use ATS\Clases\Indicador\IndicadoresPlanilla;
use ATS\Model\Estudiante;
use ATS\Model\Planilla;
use League\Fractal\TransformerAbstract;

class EstudianteTransformer extends TransformerAbstract
{
    protected  $availableIncludes = ['notas','inasistencias'];
    protected  $defaultIncludes = ['notas','inasistencias'];

    protected $asignatura;
    protected $periodo;
    protected $asignacion;
    protected $logros;
    protected $planilla;


    /**
     * EstudianteTransformer constructor.
     * @param Planilla $planilla
     */
    public function __construct (Planilla $planilla)
    {
        $this->planilla = $planilla;
        $this->periodo = $this->planilla->periodo;
        $this->asignatura = $planilla->asignacion->asignatura;
    }

    public function transform(Estudiante $estudiante)
    {
//        $estudiante->load('notas','inasistencias');
        return [
            'id' => (int) $estudiante->id,
            'planilla_id' => (int) $this->planilla->id,
            'name'    => $estudiante->apellido_name
        ];
    }
    public function includeNotas(Estudiante $estudiante)
    {
        $notas = new CurrentNota($estudiante, $this->planilla);
        $indicadores = new IndicadoresPlanilla($this->planilla);
        return $this->collection($notas->notasIndicadores($indicadores->getIndicadores()), new NotaTransformer);
    }
    public function includeInasistencias(Estudiante $estudiante)
    {
        $inasistencias =  new CurrentInasistencia($estudiante,$this->periodo);
        return $this->item($inasistencias->singleInasistenciaAsignatura($this->asignatura), new InasistenciaTransformer);
    }
}
