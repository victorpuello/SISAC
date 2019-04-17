<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInstitucionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
//        dd($this->request->all());
        return [
            'name'=> 'required|min:3|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|max:40',
            'siglas' => 'alpha',
            'dane' => 'required|string',
            'nit' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'email',
            'rector' => 'required|min:3|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|max:40',
            'idrector' => 'required|numeric|max:9999999999|min:1000000',
            'resolucion' => 'required|numeric',
            'slogan' => 'string',
            'path'=>'required|image|mimes:jpeg,bmp,png',
        ];
    }
}
