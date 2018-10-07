<?php

namespace ATS\Transformers;


use ATS\Model\Asignatura;
use League\Fractal\TransformerAbstract;


class AsignaturaTransformer extends TransformerAbstract
{
    /**
     * @param \App\Asignatura $asignatura
     * @return array
     */
    public function transform(Asignatura $asignatura)
    {
        return [
            'id' => (int) $asignatura->id,
            'name' => (string) $asignatura->name,
            'short_name' => (string) $asignatura->short_name,
            'porcentaje' => (int) $asignatura->porcentaje,
            'nivel' => (string) $asignatura->nivel,
            'area' => (string) $asignatura->area->name
        ];
    }
}