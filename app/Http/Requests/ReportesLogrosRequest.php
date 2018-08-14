<?php

namespace Ngsoft\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Ngsoft\Rules\ValidateAsignacion;

class ReportesLogrosRequest extends FormRequest
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
            "periodo" => Rule::exists('periodos','id'),
            "docente" => Rule::exists('docentes','id'),
            "grade" => Rule::exists('salons','grade'),
            "asignatura" => [Rule::exists('asignaturas','id'), new ValidateAsignacion($this->request)]
        ];
    }
}
