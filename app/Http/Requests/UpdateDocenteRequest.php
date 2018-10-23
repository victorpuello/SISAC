<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use ATS\Model\Docente;

class UpdateDocenteRequest extends FormRequest
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
        return[
            'typeid' => 'required|in:CC,CE,PT',
            'numberid' => 'required|numeric|max:9999999999|min:1000000',Rule::unique('docentes')->ignore($this->docente->numberid),
            'fnac' => 'required|date',
            'address' => 'required|string',
            'gender' => 'required|in:M,F',
            'phone' => 'required|numeric',
            'path' => 'image|mimes:jpeg,bmp,png',
            'user_id' => 'required',Rule::unique('docentes')->ignore($this->docente->user_id)
        ];
    }
}
