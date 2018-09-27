<?php

use ATS\Grupo;

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
function currentUser()
{
    return auth()->user();
}

/**
 * @return mixed
 */
function currentPerfil(){
    return auth()->user()->type;
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
    if ($score < 6){
        return 'Bajo';
    }
    if ($score >= 6 && $score < 8){
        return 'Básico';
    }
    if ($score >= 8 && $score < 9.5){
        return 'Alto';
    }
    if ($score >= 9.5 && $score <= 10){
        return 'Superior';
    }
}
