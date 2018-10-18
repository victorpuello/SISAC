<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use ATS\Estudiante;

class UpdateEstudianteRequest extends FormRequest
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
            'name'=> 'required|min:3|string|max:40',
            'lastname'=>'required|min:3|string|max:40',
            'typeid'=>'required|in:RC,TI,CC,DE',
            'identification'=>'required|numeric|max:9999999999|min:1000000',Rule::unique('estudiantes')->ignore($this->estudiante),
            'birthday' => 'required|date',
            'birthstate'=>'required',
            'birthcity'=>'required',
            'gender'=>'required|in:M,F',
            'address' => 'required|string',
            'EPS'=>'required|min:3|string|max:40',
            'phone'=>'required|numeric',
            'datein'=>'required|date',
            'dateout'=>'required_if:stade,retirado|date|nullable',
            'path'=>'image|mimes:jpeg,bmp,png',
            'stade'=>'required|in:activo,retirado,graduado',
            'situation'=>'required|in:nuevo,repitente,promovido,normal',
            'grupo_id'=>'required|numeric'
        ];
    }
}
