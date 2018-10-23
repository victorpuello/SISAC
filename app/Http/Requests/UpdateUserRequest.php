<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use ATS\User;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|min:3|string|max:40',
            'lastname' => 'required|string|min:3|max:40',
            'username' => 'required|string|max:40|min:6',  Rule::unique('users')->ignore($this->user->username,'user_username'),
            'email' => 'email|required', Rule::unique('users')->ignore($this->user->email,'user_email'),
            'password' => 'min:6',
            'password-confirm' => 'same:password',
            'type' => 'in:admin,coordinador,docente,secretaria',
            'path'=>'nullable|image|mimes:jpeg,bmp,png',
        ];
    }
}
