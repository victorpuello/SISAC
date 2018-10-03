<?php

namespace ATS\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateAsignacion implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $grado_id;
    protected $docente_id;

    /**
     * ValidateAsignacion constructor.
     * @param $docente_id
     * @param $grado_id
     */
    public function __construct($docente_id, $grado_id)
    {
        $this->docente_id = $docente_id;
        $this->grado_id = $grado_id;
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
        return if_exist_asignacion($this->docente_id,$value,$this->grado_id) === true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El docente no tiene asignacion para esta asignatura en este grado';
    }
}
