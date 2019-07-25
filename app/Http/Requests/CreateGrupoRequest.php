<?php

namespace ATS\Http\Requests;

use ATS\Rules\ValidateGrupo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateGrupoRequest extends FormRequest
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
            'name' => ['required',new ValidateGrupo($this->name,$this->grado_id,$this->modelo),'in:1,2,3,4,5,6,7,8'],
            'grado_id' => ['required',Rule::exists('grados','id')],
            'modelo' => 'required|in:tradicional,escuela nueva,etnoeducación,Aceleración,decreto 3011',
            'jornada_id' => ['required',Rule::exists('jornadas','id')],
        ];
    }
}
