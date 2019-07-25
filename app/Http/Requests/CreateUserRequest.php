<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JavaScript;
class CreateUserRequest extends FormRequest
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
//        if (!isset($this->request->path)){
//            $this->request->set('path',null);
//        }
        return [
            'name' => 'required|min:3|string|max:40',
            'lastname' => 'required|string|min:3|max:40',
            'username' => 'required|string|max:40|min:6|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'password-confirm' => 'same:password',
            'type' => 'required|in:admin,coordinador,docente,secretaria',
            'path'=>'nullable|image|mimes:jpeg,bmp,png',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'email.required' => 'Añade una cuenta de email valida',
            'username.alpha' => 'El :attribute debe ser solo letras',
            'password-confirm.same' => 'La contraseña no coinciden'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nombres',
            'lastname' => 'Apellidos',
            'username' => 'Nombre de usuario',
            'email' => 'E-mail',
            'password' => 'Contraseña',
            'type' => 'Tipo de usuario'
        ];
    }
}
