<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use ATS\Rules\ValidateAsignacion;

class ReportesIndicadoresRequest extends FormRequest
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
//        dd($this->request->all());
        return [
            "periodo" => ['nullable',Rule::exists('periodos','id')],
            "docente" => Rule::exists('docentes','id'),
            "grade" =>  ['nullable',Rule::exists('grados','id')],
            "asignatura" =>  ['nullable',Rule::exists('asignaturas','id'), new ValidateAsignacion($this->docente,$this->grade)]
        ];
    }
}
