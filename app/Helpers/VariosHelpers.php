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
