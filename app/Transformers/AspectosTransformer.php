<?php

namespace ATS\Transformers;

use ATS\Model\Aspecto;
use League\Fractal\TransformerAbstract;

class AspectosTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Aspecto $aspecto)
    {
        return [
            'id' => (int) $aspecto->id,
            'escala' => (string) $aspecto->escala,
            'category' => (string) $aspecto->category,
            'description' => (string) substr($aspecto->description,0,90).'...',
        ];
    }
}
