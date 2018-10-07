<?php

namespace ATS\Transformers;


use ATS\Model\Asignacion;
use League\Fractal\TransformerAbstract;

class AsignacionTransformer extends TransformerAbstract
{
    /**
     * @param \App\Asignacion $asignacion
     * @return array
     */
    public function transform(Asignacion $asignacion)
    {
        return [
            'id' => (int) $asignacion->id,
            'asignatura' => (string) $asignacion->asignatura->name,
            'docente' => (string) $asignacion->docente->name,
            'grupo' => (string) $asignacion->grupo->name_aula,
            'anio' => (string) $asignacion->anio->name,
            'director' => (string) $asignacion->direccion,
            'active' => (string) $asignacion->estado
        ];
    }
}