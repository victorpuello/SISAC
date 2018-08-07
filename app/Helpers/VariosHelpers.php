<?php

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



/**
 * @param $score
 * @return string
 */
function indicador($score){
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
