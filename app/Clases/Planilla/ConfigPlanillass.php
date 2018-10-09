<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 8/10/2018
 * Time: 5:55 PM
 * Objeto que  se encarga de la configuracion de las planillas
 */

namespace ATS\Clases\Planilla;


use Illuminate\Support\Facades\Config;

class ConfigPlanillass
{
    /**
     * @var array
     */
    private $atributes;
    protected $nroIndicadores;
    protected $planilla_mode;
    public function __construct (Array $atributes=null) {
        $this->atributes = $atributes;
        if (is_null($atributes)){
            $this->atributes = Config::get('institucion.indicadores');
        }
        $this->nroIndicadores = intval($this->atributes['numeroIndicadores']);
        $this->planilla_mode = $this->atributes['modoPlanilla'];
    }
    public function nro_indicadores(){
        return $this->nroIndicadores;
    }
    public function mode_planilla(){
        return $this->planilla_mode;
    }

}