<?php

namespace Ngsoft\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Ngsoft\Periodo;

class ValidatePeriodo implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $marcador = false;/*
        if (Periodo::find($value)->dateend <= Carbon::now()){
            $marcador = true;
        }*/
        if (currentPerfil() ==='admin'){$marcador = false;}
        return $marcador === false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La insersión o modificacion de logros para este periodo ha finalizado';
    }
}
