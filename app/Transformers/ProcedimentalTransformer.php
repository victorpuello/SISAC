<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 19/08/2018
 * Time: 1:26 PM
 */

namespace Ngsoft\Transformers;


use League\Fractal\TransformerAbstract;
use Ngsoft\Nota;

class ProcedimentalTransformer extends TransformerAbstract
{


    /**
     * @param Nota $nota
     * @return array
     */
    public function transform(Nota $nota){
        return [
            'id'         => $nota->id,
            'score'    => $nota->score
        ];
    }
}
