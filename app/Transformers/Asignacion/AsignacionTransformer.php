<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 2/08/2018
 * Time: 9:46 PM
 */

namespace ATS\Transformers\Asignacion;


use League\Fractal\TransformerAbstract;
use ATS\Asignacion;

class AsignacionTransformer extends TransformerAbstract
{
   // protected  $availableIncludes = ['docente','salon','asignatura'];
    //protected  $defaultIncludes = ['docente','salon','asignatura'];

    public function transform(Asignacion $asignacion) {
        //dd($asignacion);
        return [
            'id' => $asignacion->id,
            'horas' => $asignacion->horas,
            'director' => $asignacion->director,
            'docente' => $asignacion->docente->name,
            'salon' => $asignacion->salon->full_name,
            'asignatura' => $asignacion->asignatura->name,
        ];
    }

   /* public function includeDocente(Asignacion $asignacion)
    {
        $docente =  $asignacion->docente;
        return $this->item($docente, new DocenteTransformer);
    }
    public function includeSalon(Asignacion $asignacion)
    {
        $salon =  $asignacion->salon;
        return $this->item($salon, new SalonTransformer);
    }
    public function includeAsignatura(Asignacion $asignacion)
    {
        $asignatura =  $asignacion->asignatura;
        return $this->item($asignatura, new AsignaturaTransformer);
    }*/
}
