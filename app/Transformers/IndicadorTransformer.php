<?php

namespace ATS\Transformers;

use ATS\Indicador;
use League\Fractal\TransformerAbstract;


class IndicadorTransformer extends TransformerAbstract
{
    /**
     * @param \App\Indicador $indicador
     * @return array
     */
    public function transform(Indicador $indicador)
    {
        return [
            'id' => (int) $indicador->id,
            'grado' => (string) $indicador->grado->name,
            'asignatura' => (string) $indicador->asignatura->name,
            'periodo' => (string) $indicador->periodo->name,
            'docente' => (string) $indicador->docente->name,
            'indicador' => (string) $indicador->indicator,
            'categoria' => (string) $indicador->category,
            'descripcion' => (string) substr($indicador->description,0,50).'...',
        ];
    }
}
