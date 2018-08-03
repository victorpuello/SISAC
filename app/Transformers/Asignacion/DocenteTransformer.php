<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 2/08/2018
 * Time: 9:52 PM
 */

namespace Ngsoft\Transformers\Asignacion;


use League\Fractal\TransformerAbstract;
use Ngsoft\Docente;

class DocenteTransformer extends TransformerAbstract
{

    public function transform(Docente $docente) {
        return [
            'id' => $docente->id,
            'name' => $docente->name,
        ];
    }
}
