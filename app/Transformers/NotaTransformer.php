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
    public function transform(Nota $nota){

        if ($nota->category === 'cognitivo'){
            return [
                'cognitivo' => $this->getNota($nota)
            ];
        }
        if ($nota->category === 'procedimental'){
            return [
                'procedimental' => $this->getNota($nota)
            ];
        }
        if ($nota->category === 'actitudinal'){
            return [
                'actitudinal' => $this->getNota($nota)
            ];
        }
    }
    public function getNota(Nota $nota){
        return [
            'score' => $nota->score,
            'id'=> $nota->id
        ];
    }
}
