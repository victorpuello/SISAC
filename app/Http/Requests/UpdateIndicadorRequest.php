<?php

namespace ATS\Http\Requests;

use ATS\Rules\ValidateAsignacion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIndicadorRequest extends FormRequest
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
        $code = $this->request->get('grado_id').''.$this->request->get('asignatura_id').''.$this->request->get('grado_id').''.$this->request->get('periodo_id').''.$this->request->get('docente_id').''.$this->request->get('category').''.$this->request->get('indicator');
        $this->merge(['code'=>$code]);
        return [
            'code' => Rule::unique('indicadors')->ignore($this->indicador),
            'grado_id' => ['required',Rule::exists('grados','id')],
            'asignatura_id' => ['required',Rule::exists('asignaturas','id'),new ValidateAsignacion($this->request->get('docente_id'),$this->request->get('grado_id'))],
            'periodo_id' => ['required',Rule::exists('periodos','id')],
            'docente_id' => ['required',Rule::exists('docentes','id')],
            'category' => 'required|in:cognitivo,procedimental,actitudinal',
            'indicator' => 'required|in:bajo,basico,alto,superior',
            'description'  => 'required|min:3|string|max:400'
        ];
    }
}
