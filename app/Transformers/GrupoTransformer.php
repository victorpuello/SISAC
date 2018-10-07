<?php

namespace ATS\Transformers;


use ATS\Model\Grupo;
use League\Fractal\TransformerAbstract;

class GrupoTransformer extends TransformerAbstract
{
    /**
     * @param \App\Grado $grado
     * @return array
     */
    public function transform(Grupo $grupo)
    {
        return [
            'id' => (int) $grupo->id,
            'name' => $grupo->name,
            'grado' => $grupo->grado->name,
            'modelo' => $grupo->modelo,
            'jornada' => $grupo->jornada->name,
            'estudiantes' => count($grupo->estudiantes),
        ];
    }
}