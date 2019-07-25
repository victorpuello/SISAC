<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FiltroRequest extends FormRequest
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
            'docente_id' => ['required',Rule::exists('docentes','id')],
            'anio' => ['required',Rule::exists('anios','id')],
            'periodo_id' => ['required',Rule::exists('periodos','id')],
        ];
    }
}
