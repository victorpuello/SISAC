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

class GrupoTransformer extends TransformerAbstract
{

    /**
     * @param Grupo $grupo
     * @return array
     */
    public function transform(Grupo $grupo) {
        dd('hola',$grupo);
        return [
            'id' => (int) $grupo->id,
            'name' => (string) $grupo->name_aula,
        ];
    }
}
