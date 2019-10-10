<?php


namespace ATS\Clases;


use ATS\Model\Area;
use ATS\Model\Asignatura;
use ATS\Model\Grado;
use ATS\Model\Grupo;


class SIE
{
    /**
     * @var \Illuminate\Config\Repository
     */
    protected $sie;
    protected $grupo;

    public function __construct(Grupo $grupo)
    {
        $this->sie = config('institucion.SIE');
        $this->grupo = $grupo;
    }
    public function getSIEAreas( $nivel){
//        dd($nivel);
        return config('institucion.SIE.'.$nivel.'.areas');
    }
    public function getSIEAsignaturas( $nivel, $idArea){
        return config('institucion.SIE.'.$nivel.'.areas.'.$idArea.'.asignaturas');
    }


    /**
     * @param Grado $grado
     * @return \Illuminate\Support\Collection
     */
    public function getAsignaturasGrado(Grado $grado){
        $asig = Asignatura::all();
        $asignaturas = collect();
        $ar_sies = $this->getSIEAreas($grado->nivel);
        // el primer for recorrer laas areas del SIE
        foreach ($ar_sies as $key => $ars){
            $asg_sies = $this->getSIEAsignaturas($grado->nivel,$key);
            foreach ($asg_sies as $k => $ar){
                $asignaturas->push($asig->where('id','=',$k)->first());
            }
        }
        return $asignaturas;
    }

    /**
     * @param Grado $grado
     * @return \Illuminate\Support\Collection
     */
    public function getAreasGrado(Grado $grado){
        $ar = $this->getAreas();
        $areas = collect();
        $ar_sies = $this->getSIEAreas($grado->nivel);
//        dd($ar_sies);
        foreach ($ar_sies as $key => $ars){
            $areas->push($ar->where('id','=',$key)->first());
        }
        return $areas;
    }

    public function getAsignaturasArea(Grado $grado, Area $area){
        $asig = $this->getAsignaturas();
        $asignaturas = collect();
            $asg_sies = $this->getSIEAsignaturas($grado->nivel,$area->id);
            foreach ($asg_sies as $k => $ar){
                $asignaturas->push($asig->where('id','=',$k)->first());
            }
        return $asignaturas;
    }

    public function porcentajeAsignatura(Grado $grado,Asignatura $asignatura){
        return config('institucion.SIE.'.$grado->nivel.'.areas.'.$asignatura->area->id.'.asignaturas.'.$asignatura->id);
    }
    public function porcentajeArea(Grado $grado,Area $area){
        return config('institucion.SIE.'.$grado->nivel.'.areas.'.$area->id.'.porcentaje');
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    private function getAsignaturas(){
        $asignaturas = collect();
        foreach ($this->grupo->asignaciones as $asignacion){
            $asignaturas->push($asignacion->asignatura);
        }
        return $asignaturas->sortBy('area_id')->unique();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function getAreas(){
        $areas = collect();
        foreach ($this->grupo->asignaciones as $asignacion){
            $areas->push($asignacion->asignatura->area);
        }
        return $areas->sortBy('id')->unique();
    }
}
