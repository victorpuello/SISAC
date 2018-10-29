<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGradoRequest extends FormRequest
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
            'name' => 'string|max:40|',Rule::unique('grados')->ignore($this->grado->name, 'grados_name'),
            'numero' => 'integer|max:26',
            'nivel'=>'required|in:,preescolar,primaria,secundaria,media'
        ];
    }
}
