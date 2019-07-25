<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 6/10/2018
 * Time: 1:09 AM
 */

namespace ATS\Clases;


class CurrentPeriodo
{
    protected $anio;

    /**
     * CurrentPeriodo constructor.
     */
    public function __construct ()
    {
        $this->anio = New CurrentAnio();
    }

    /**
     * @return mixed
     */
    public function getPeriodo(){
        $anio = $this->anio->getAnio();
        return $anio->periodos->where('estado','=','activo')->first();
    }
}