<?php

namespace ATS\Transformers;

use ATS\Model\Inasistencia;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;


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
