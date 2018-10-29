<?php

namespace ATS\Http\Requests;

use ATS\Clases\CurrentPeriodo;
use ATS\Model\Asignacion;
use ATS\Model\Planilla;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreateAsignacionRequest extends FormRequest
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
            'horas' => 'integer',
            'asignatura_id' => ['required','integer',Rule::exists('asignaturas','id')],
            'docente_id' => ['required','integer',Rule::exists('docentes','id')],
            'grupo_id' => ['required','integer',Rule::exists('grupos','id')],
            'anio_id' => ['required','integer',Rule::exists('anios','id')],
            'director' => 'boolean',
            'active' => 'boolean',
        ];
    }
     public function createAsignacion(){
        DB::transaction(function () {
            $data = $this->validated();
            $asignacion = Asignacion::create([
                'horas' => $data['horas'],
                'docente_id' => $data['docente_id'],
                'grupo_id' => $data['grupo_id'],
                'asignatura_id' => $data['asignatura_id'],
                'director' => $data['director'],
                'active' => $data['active'],
                'anio_id' => $data['anio_id']
            ]);
            $p = new CurrentPeriodo();
            $periodo = $p->getPeriodo();
            $planilla = Planilla::create([
                'modificada' => false,
                'periodo_id' => $periodo->id,
                'asignacion_id' => $asignacion->id
            ]);
        });
     }
}
