<?php

namespace ATS\Transformers;

use ATS\Model\Area;
use League\Fractal\TransformerAbstract;

class AreaTransformer extends TransformerAbstract
{
    /**
     * @param \App\Area $area
     * @return array
     */
    public function transform(Area $area)
    {
        return [
            'id' => (int) $area->id,
            'name' => (string) $area->name,
            'porcentaje' => (int) $area->porcentaje,
            'asignaturas' => $area->asignaturas
        ];
    }
}