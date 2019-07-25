<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAsignacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'horas' => 'integer',
            'asignatura_id' => ['required','integer',Rule::exists('asignaturas','id')],
            'docente_id' => ['required','integer',Rule::exists('docentes','id')],
            'grupo_id' => ['required','integer',Rule::exists('grupos','id')],
            'anio_id' => ['required','integer',Rule::exists('anios','id')],
            'director' => 'boolean',
            'active' => 'boolean',
        ];
    }
}
