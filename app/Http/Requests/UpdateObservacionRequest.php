<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateObservacionRequest extends FormRequest
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
            'valoracion' => 'required|in:S,CS,AV,N'
        ];
    }
}
