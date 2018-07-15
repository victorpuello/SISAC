<?php

namespace Ngsoft\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use Ngsoft\Docente;

class UpdateDocenteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    private $route;
    private $docente;
    public function __construct (Route $route)
    {
        $this->route = $route;
    }

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
        $this->docente = Docente::find($this->route->parameter('docente'));
        return[
            'typeid' => 'required|in:CC,CE,PT',
            'numberid' => 'required|numeric|max:9999999999|min:1000000',Rule::unique('docentes')->ignore($this->docente->numberid, 'docente_numberid'),
            'fnac' => 'required|date',
            'gender' => 'required|in:M,F',
            'address' => 'required|min:3|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%,-]).*$/|max:80',
            'phone' => 'required|numeric',
            'path' => 'image|mimes:jpeg,bmp,png',
            'coordinator' => 'nullable',
            'user_id' => 'required',Rule::unique('docentes')->ignore($this->docente->user_id,'docente_user_id')
        ];
    }
}
