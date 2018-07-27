<?php

namespace Ngsoft\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEstudianteRequest extends FormRequest
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
            'name'=> 'required|min:3|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|max:40',
            'lastname'=>'required|min:3|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|max:40',
            'typeid'=>'required|in:RC,TI,CC,DE',
            'identification'=>'required|numeric|max:9999999999|min:1000000|unique:estudiantes,identification',
            'birthday' => 'required|date',
            'birthstate'=>'required',
            'birthcity'=>'required',
            'gender'=>'required|in:M,F',
            'address'=>'required|min:3|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|max:80',
            'EPS'=>'required|min:3|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|max:40',
            'phone'=>'required|numeric',
            'datein'=>'required|date',
            'dateout'=>'required_if:stade,retirado|date|nullable',
            'path'=>'image|mimes:jpeg,bmp,png',
            'stade'=>'required|in:activo,retirado,graduado',
            'situation'=>'required|in:nuevo,repitente,promovido,normal',
            'salon_id'=>'required|numeric'
        ];
    }
}