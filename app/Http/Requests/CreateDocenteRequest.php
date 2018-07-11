<?php

namespace Ngsoft\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDocenteRequest extends FormRequest
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
            'numberid' => 'required|numeric|max:9999999999|min:1000000|unique:docentes,numberid',
            'fnac' => 'required|date',
            'gender' => 'required|in:M,F',
            'address' => 'required|min:3|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|max:80',
            'phone' => 'required|numeric',
            'path' => 'image|mimes:jpeg,bmp,png',
            'coordinator' => 'nullable',
            'user_id' => 'required|unique:docentes,user_id'
        ];
    }
}
