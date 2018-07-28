<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 27/07/2018
 * Time: 5:48 PM
 */

namespace Ngsoft\Transformers;


use League\Fractal\TransformerAbstract;
use Ngsoft\Nota;

class NotaTransformer extends TransformerAbstract
{
    public function transform($nota){
        return [
            'id'         => $nota->id,
            'score'    => $nota->score
        ];
    }
}
