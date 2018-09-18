<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 2/08/2018
 * Time: 9:54 PM
 */

namespace ATS\Transformers\Asignacion;


use League\Fractal\TransformerAbstract;
use ATS\Asignatura;

class AsignaturaTransformer extends TransformerAbstract
{

    /**
     * AsignaturaTransformer constructor.
     */
    public function transform(Asignatura $asignatura) {
        return [
            'id' => $asignatura->id,
            'name' => $asignatura->name,
        ];
    }
}
