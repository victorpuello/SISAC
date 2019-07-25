<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAspectoRequest extends FormRequest
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
            'category' => 'required|in:academico,convivencia',
            'escala' => 'required|in:texto,numerica',
            'description' => 'required|min:15|string|max:400'
        ];
    }
}
