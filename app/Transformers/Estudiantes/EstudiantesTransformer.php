<?php
/**
 * Created by PhpStorm.
 * User: INELMU
 * Date: 16/09/2018
 * Time: 4:57 PM
 */

namespace ATS\Transformers\Estudiantes;


use ATS\Estudiante;
use League\Fractal\TransformerAbstract;

class EstudiantesTransformer extends TransformerAbstract
{
    public function transform(Estudiante $estudiante)
    {
        return [
            'id' => (int) $estudiante->id,
            'name' => ucwords($estudiante->name),
            'lastname' => ucwords($estudiante->lastname),
            'typeid' => $estudiante->typeid,
            'identification' => $estudiante->identification,
            'birthday' => $estudiante->birthday,
            'birthstate' => $estudiante->birthstate,
            'birthcity' => $estudiante->birthcity,
            'gender' => $estudiante->gender,
            'address' => $estudiante->address,
            'EPS' => $estudiante->EPS,
            'phone' => $estudiante->phone,
            'datein' => $estudiante->datein,
            'dateout' => $estudiante->dateout,
            'path' => $estudiante->path,
            'stade' => ucwords($estudiante->stade),
            'situation' => $estudiante->situation,
            'grupo' => $estudiante->grupo->name_aula,
            //'btn' => 'admin.estudiantes.partial.actions'
        ];
    }
}