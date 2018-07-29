<?php

namespace Ngsoft\Transformers;

use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;
use Ngsoft\Inasistencia;

class InasistenciaTransformer extends TransformerAbstract
{
    /**
     * @param \Ngsoft\Inasistencia $inasistencia
     * @return array
     */
    public function transform( $inasistencia)
    {
        //dd($inasistencia,'trnasforme');
        return [
            'id' => (int) $inasistencia->id,
            'numero' => $inasistencia->numero,
        ];
    }
}
