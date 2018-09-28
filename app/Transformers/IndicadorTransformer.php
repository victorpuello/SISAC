<?php

namespace ATS\Transformers;

use League\Fractal\TransformerAbstract;
use App\Indicador;

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
        ];
    }
}