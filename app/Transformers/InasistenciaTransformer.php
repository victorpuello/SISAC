<?php

namespace ATS\Transformers;

use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;
use ATS\Inasistencia;

class InasistenciaTransformer extends TransformerAbstract
{
    /**
     * @param \ATS\Inasistencia $inasistencia
     * @return array
     */
    public function transform( Inasistencia $inasistencia)
    {
        return [
            'id' => (int) $inasistencia->id,
            'numero' => $inasistencia->numero,
        ];
    }
}
