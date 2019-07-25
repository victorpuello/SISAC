<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstitucionRequest extends FormRequest
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
//        dd($this->request->all());
        return [
            'name'=> 'required|min:3|string|max:80',
            'siglas' => 'alpha',
            'dane' => 'required|string',
            'nit' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'email',
            'rector' => 'required|min:3|string|max:80',
            'idrector' => 'required|numeric|max:9999999999|min:1000000',
            'resolucion' => 'required|numeric',
            'slogan' => 'string',
            'path'=>'image|mimes:jpeg,bmp,png',
        ];
    }
}
