<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 9/05/2019
 * Time: 12:07 AM
 */

namespace ATS\Clases\Planilla;


use ATS\Model\Planilla;

class ResetPlanilla
{
    protected $planilla;
    public function __construct (Planilla $planilla)
    {
        $this->planilla = $planilla;
    }

    public function reset(){
        $this->planilla->update([
            'modificada'=>0,
            'cargada'=>0
        ]);
    }
}