<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAreaRequest extends FormRequest
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
            'name' => 'required|min:3|string|max:40|unique:areas,name',
            'porcentaje' => 'required|numeric|max:100|min:1'
        ];
    }
}
