<?php

namespace ATS\Transformers;

use ATS\Model\Indicador;
use League\Fractal\TransformerAbstract;


class IndicadorTransformer extends TransformerAbstract
{

    /**
     * @param Indicador $indicador
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
