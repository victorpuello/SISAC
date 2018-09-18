<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAnotacionRequest extends FormRequest
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
            'annotation'=> 'required|min:3|string',
            'compromises'=> 'required|min:3|string',
            'type'=> 'required|in:convivencia,academico',
            'periodo_id'=> ['required',Rule::exists('periodos','id')],
            'estudiante_id'=> ['required',Rule::exists('estudiantes','id')],
            'path'=>'image|mimes:jpeg'
        ];
    }
}
