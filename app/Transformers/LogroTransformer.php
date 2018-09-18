<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 27/07/2018
 * Time: 5:53 PM
 */

namespace ATS\Transformers;


use League\Fractal\TransformerAbstract;
use ATS\Logro;

class LogroTransformer extends  TransformerAbstract
{
    public function transform( $logro){
        return [
            'id'         => $logro->id,
            'code'       => $logro->code,
            'indicador'  => $logro->indicador,
            'description' => $logro->description,
            'category'     => $logro->category,
            'grade'       => $logro->grade,
            'asignatura_id' => $logro->asignatura_id,
            'docente_id' => $logro->docente_id,
            'periodo_id' => $logro->periodo_id
        ];

    }

}
