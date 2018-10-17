<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 6/10/2018
 * Time: 1:12 AM
 */

namespace ATS\Clases;



use ATS\Model\Anio;
use Carbon\Carbon;

class CurrentAnio
{
     protected $date;
     protected $anio;
    /**
     * CurrentAnio constructor.
     */
    public function __construct ()
     {
         $this->date = Carbon::now();
         $this->anio = Anio::where('name',$this->date->year)->with('periodos')->firstOrFail();
     }

    /**
     * @return Anio|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function getAnio(){
         return $this->anio;
    }
    public function pluck_periodos(){
        return $this->anio->periodos->pluck('name','id');
    }
    public function periodos(){
        return $this->anio->periodos;
    }
}