<?php

use ATS\Model\Asignacion;
use ATS\Model\Grupo;
use ATS\Model\Nota;


/**
 * Retorna un pluck de todos los grupos registrados
 * @return \Illuminate\Support\Collection
 */
function grupos_pluck (){
    $_grupos = Grupo::with('grado')->get();
    $group = collect();
    foreach ($_grupos as $grupo){
        $group->push([
            'id' => $grupo->id,
            'name' => $grupo->name_aula,
            'grado' => $grupo->grado->numero,
        ]);
    }
    return  $group->sortBy('grado')->pluck('name','id');
}


/**
 * @param $docente_id
 * @param $asignatura_id
 * @param $grado_id
 * @return bool
 */
function if_exist_asignacion($docente_id, $asignatura_id, $grado_id){
    $asignaciones = Asignacion::where('docente_id','=',$docente_id)->where('asignatura_id','=',$asignatura_id)->with('grupo.grado')->get();
    $found = false;
    foreach ($asignaciones as $asignacion){
        if ($asignacion->grupo->grado->id === intval($grado_id)){
            $found = true;
        }
    }
    return $found;
}


function currentUser(){
    return auth()->user();
}

function currentPerfil(){
    return auth()->user()->getRoles()->first();
}
function classAcordeon($data){
    switch ($data){
        case '1':
            return 'collapse2PrimaryOne';
        break;
        case '2':
            return 'collapse2PrimaryTwo';
        break;
        case '3':
            return 'collapse2PrimaryThree';
        break;
        case '4':
            return 'collapse2PrimaryFour';
        break;
        default:
            break;
    }
}



/**
 * @param $score
 * @return string
 */
function indicador($score){

    if ($score === ""){
        return "";
    }
    if ($score < 3){
        return 'bajo';
    }
    if ($score >= 3 && $score < 4){
        return 'basico';
    }
    if ($score >= 4 && $score < 4.6){
        return 'alto';
    }
    if ($score >= 4.6 && $score <= 5){
        return 'superior';
    }
}

function porcentajeStyle($n){
    return (60/$n);
}


/**
 * @param Nota $nota
 * @return float|int
 */
function score(Nota $nota){
    switch ($nota->category){
        case 'cognitivo':
            return config('institucion.indicadores.categorias.0.porcentaje') * $nota->score;
            break;
        case 'procedimental':
            return config('institucion.indicadores.categorias.1.porcentaje') * $nota->score;
            break;
        case 'actitudinal':
            return  config('institucion.indicadores.categorias.2.porcentaje') * $nota->score;
            break;
        default:
            break;
    }
}
