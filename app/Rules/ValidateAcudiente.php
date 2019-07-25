<?php

namespace ATS\Rules;

use Illuminate\Contracts\Validation\Rule;
use ATS\Model\Estudiante;

class ValidateAcudiente implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $marcador = false;
        $estudiante = Estudiante::findOrFail($value);
        if (! is_null($estudiante->acudiente)){
            $marcador = true;
        }
        return $marcador === false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El estudiante ya tiene acudiente registrado por favor edite el existente.';
    }
}
