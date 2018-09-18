<?php

namespace ATS\Rules;

use Illuminate\Contracts\Validation\Rule;
use ATS\Asignacion;

class ValidateAsignacion implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $request;
    public function __construct($request)
    {
        $this->request = $request->all();
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
        $asignaciones = Asignacion::where('docente_id','=', $this->request['docente'])
                                ->where('asignatura_id','=',$value)
                                ->with('salon')
                                ->get();
        foreach ($asignaciones as $asignacion){
            if ($asignacion->salon->grade === $this->request['grade']){
                $marcador = true;
            }
        }
        return $marcador === true;
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
