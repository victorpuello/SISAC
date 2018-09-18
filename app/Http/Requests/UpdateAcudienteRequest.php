<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use ATS\Acudiente;

class UpdateAcudienteRequest extends FormRequest
{
    private $route;
    private $acudiente;
    public function __construct (Route $route)
    {
        $this->route = $route;
    }
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
        $this->acudiente = Acudiente::find($this->route->parameter('acudiente'))->first();
        return [
            'name'=> 'required|min:3|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|max:40',
            'lastname'=>'required|min:3|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|max:40',
            'relationship'=>'required|in:Padre,Madre,Abuelo,Hermano,Tío,Conyuge,Otro',
            'document'=>'required|numeric|max:9999999999|min:1000000',Rule::unique('acudientes')->ignore($this->acudiente->document, 'acudiente_document'),
            'phone'=>'required|numeric',
            'email' => 'email',
            'address' => 'required|regex:/([- ,\/0-9a-zA-Z]+)/',
            'estudiante_id' => 'required',Rule::exists('estudiantes','id')
        ];
    }
}
