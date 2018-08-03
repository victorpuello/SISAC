<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 2/08/2018
 * Time: 9:53 PM
 */

namespace Ngsoft\Transformers\Asignacion;


use League\Fractal\TransformerAbstract;
use Ngsoft\Salon;

class SalonTransformer extends TransformerAbstract
{

    /**
     * SalonTransformer constructor.
     */
    public function transform(Salon $salon) {
        return [
            'id' => $salon->id,
            'name' => $salon->full_name,
        ];
    }
}
