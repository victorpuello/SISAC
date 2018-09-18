<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 2/08/2018
 * Time: 9:53 PM
 */

namespace ATS\Transformers\Asignacion;


use League\Fractal\TransformerAbstract;
use ATS\Grupo;

class SalonTransformer extends TransformerAbstract
{

    /**
     * SalonTransformer constructor.
     */
    public function transform(Grupo $salon) {
        return [
            'id' => $salon->id,
            'name' => $salon->full_name,
        ];
    }
}
