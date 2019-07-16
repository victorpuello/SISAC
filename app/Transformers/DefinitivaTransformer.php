<?php

namespace ATS\Transformers;

use ATS\Model\Definitiva;
use League\Fractal\TransformerAbstract;

class DefinitivaTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Definitiva $definitiva)
    {
        return [
            'id' => (int) $definitiva->id,
            'estudiante' => (string) $definitiva->estudiante->full_name,
            'grado' => (string) $definitiva->estudiante->grupo->grado->name,
            'grupo' => (string) $definitiva->estudiante->grupo->name,
            'asignatura' => (string) $definitiva->asignatura->name,
            'periodo' => (string) $definitiva->periodo->name,
            'score' => (string) $definitiva->score,
            'indicador' => (string) $definitiva->indicador,
        ];
    }
}
