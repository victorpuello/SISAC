<?php

namespace Ngsoft\Transformers;

use League\Fractal\TransformerAbstract;
use Ngsoft\Estudiante;
use Ngsoft\Inasistencia;
use Ngsoft\Nota;

class EstudianteTransformer extends TransformerAbstract
{
    protected  $availableIncludes = ['notas','inasistencias'];
    protected  $defaultIncludes = ['notas','inasistencias'];
    /**
     * @param \Ngsoft\Estudiante $estudiante
     * @return array
     */
    protected $grado;
    protected $asignatura;
    protected $periodo;
    protected $docente;

    /**
     * EstudianteTransformer constructor.
     * @param $grado
     * @param $asignatura
     * @param $docente
     * @param $periodo
     */
    public function __construct ($grado, $asignatura, $docente, $periodo)
    {
        //dd($grado, $asignatura, $docente, $periodo);
        $this->grado = $grado;
        $this->asignatura = $asignatura;
        $this->docente = $docente;
        $this->periodo = $periodo;
    }

    public function transform(Estudiante $estudiante)
    {
        return [
            'id' => (int) $estudiante->id,
            'name'    => $estudiante->apellido_name,
            'grado'  => $this->grado,
            'asignatura'  => $this->asignatura,
            'docente'  => $this->docente,
            'periodo'  => $this->periodo,
        ];
    }
    // añade al JSON las notas de ese periodo
    public function includeNotas(Estudiante $estudiante)
    {
        $notas =  $estudiante->currentNotas($this->grado,$this->asignatura,$this->docente,$this->periodo);
        //dd($notas);
        return $this->collection($notas, new NotaTransformer);
    }
    // añade al JSON las inasistencia de ese periodo
    public function includeInasistencias(Estudiante $estudiante)
    {
        $inasistencias =  $estudiante->currentInasistencias($this->asignatura,$this->periodo);
       // dd($inasistencias,'hola');
        return $this->collection($inasistencias, new InasistenciaTransformer);
    }
}
