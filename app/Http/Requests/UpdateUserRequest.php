<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => 'required|max:45',
            'last_name' => 'required|max:45',
            'avatar' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => 'required|max:15',
            'dni' => ['required','digits:13', Rule::unique('users')->ignore($this->user->id)],
            'birthday' => 'required|date',
            'cellphone_number' => ['required',  Rule::unique('users')->ignore($this->user->id)],
            'address' => 'required|max:45',
            'email' => ['required', Rule::unique('users')->ignore($this->user->id)]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no debe contener más de 45 caracteres.',
            'last_name.required' => 'El apellido es obligatorio.',
            'last_name.max' => 'El apellido no debe contener más de 45 caracteres.',
            'avatar.image' =>'El avatar debe ser una imagen.',
            'avatar.mimes' =>'El avatar debe ser de alguno de éstos formatos: jpeg,png,jpg,gif,svg.',
            'avatar.max' =>'El avatar no debe pesar más de 2048 MB.',
            'username.required' => 'El nombre de usuario es obligatorio.',
            'username.max' => 'El nombre de usuario no debe contener más de 15 caracteres.',
            'dni.required' => 'El número de identidad es obligatorio.',
            'dni.unique' => 'Éste número de identidad ya está registrado.',
            'dni.digits' => 'El número de identidad debe contener 13 digitos sin espacios ni guiones.',
            'birthday.required' => 'La fecha de nacimiento es obligatoria.',
            'birthday' => 'Este campo debe ser insertado en formato de fecha.',
            'cellphone_number.required' => 'El número celular es obligatorio.',
            'cellphone_number.unique' => 'Éste número celular ya está registrado.',
            'cellphone_number.digits' => 'El número celular debe contener 8 dígitos sin espacios ni guiones.',
            'address.required' => 'La dirección es obligatoria.',
            'address.max' => 'La dirección no debe exceder los 45 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.unique' => 'Éste email ya está registrado.',
        ];
    }
}
