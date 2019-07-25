<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use ATS\Rules\CountCodeLogro;
use ATS\Rules\ValidatePeriodo;

class CreateLogroRequest extends FormRequest
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
            'code' => ['required','numeric', new CountCodeLogro($this->request)],
            'indicador' => 'required|in:bajo,basico,alto,superior',
            'description'  => 'required|min:3|string|max:400',
            'category'  => 'required|in:cognitivo,procedimental,actitudinal',
            'grade'  =>'required|numeric',
            'asignatura_id'=>'required|numeric',
            'docente_id'=>'required|numeric',
            'periodo_id'=>['required','numeric', new ValidatePeriodo()]
        ];
    }
}
