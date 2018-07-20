<?php

namespace Ngsoft\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ngsoft\Rules\CountCodeLogro;
use Ngsoft\Rules\ValidatePeriodo;

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
            'code' => 'unique:logros,code',
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
