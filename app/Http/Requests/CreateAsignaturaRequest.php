<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAsignaturaRequest extends FormRequest
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
            'name' => 'string|max:40|unique:asignaturas|unique:asignaturas,name',
            'short_name' => 'string|max:5|unique:asignaturas|unique:asignaturas,short_name',
            'porcentaje' => 'required|numeric|max:100|min:1',
            'nivel'=>'required|in:preescolar,basica,media,institucional',
            'area_id' =>  ['required',Rule::exists('areas','id')]
        ];
    }
}
