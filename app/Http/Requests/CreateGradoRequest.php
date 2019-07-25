<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGradoRequest extends FormRequest
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
            'name' => 'required|string|max:40|unique:grados',
            'numero' => 'integer|max:26',
            'nivel'=>'required|in:,preescolar,primaria,secundaria,media'
        ];
    }
}
