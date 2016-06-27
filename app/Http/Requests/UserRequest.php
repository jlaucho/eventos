<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'nombre'    =>'required|min:4|max:20|alpha',
            'apellido'  =>'required|min:4|max:20|alpha',
            'cedula'    =>'required|unique:users',
            'email'     =>'required|unique:users|email',
            'telf1'     =>'required|digits:11|numeric|regex:[^04[12]{1}[246]{1}[0-9]{7}]',
            'telf2'     =>'required|digits:11|numeric|regex:[^02[123456789]{2}]',
            //'telf1'     =>'required|digits:11|numeric',
            //'telf2'     =>'required|digits:11|numeric',
            'nivel'     =>'required',
            'password'  =>'required|min:6|max:30|confirmed',
            
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'   =>'El nombre es Obligatorio',
            'nombre.min'        =>'El nombre debe tener mas de :min caracteres',
            'nombre.max'        =>'El nombre debe tener menos de :max caracteres',
            'nombre.alpha'      =>'El nombre debe contener solo letras',
            'apellido.required' =>'El apellido es Obligatorio',
            'apellido.min'      =>'El apellido debe tener mas de :min caracteres',
            'apellido.max'      =>'El apellido debe tener menos de :max caracteres',
            'apellido.alpha'    =>'El apellido debe contener solo letras',
            'cedula.required'   =>'La cedula es Obligatoria',
            'cedula.unique'     =>'La cedula ya se encuentra registrada en el sistema',
            'email.required'    =>'El correo es Obligatorio',
            'email.unique'      =>'El correo ya se ecuentra registrado en el sistema',
            'email.email'       =>'Favor introduzca un email valido',
            'telf1.required'    =>'El Telefono celular celular es Obligatorio',
            'telf1.digits'      =>'El telefono celular debe contener 11 digitos',
            'telf1.numeric'     =>'El telefono celular debe contener solo numeros',
            'telf1.regex'       =>'El formato del telefono celular es invalido',
            'telf2.regex'       =>'El formato del telefono es invalido',
            'telf2.required'    =>'El Telefono Local es Obligatorio',
            'telf2.digits'      =>'El telefono debe contener 11 digitos',
            'telf2.numeric'     =>'El telefono debe contener solo numeros',
            'nivel.required'    =>'El nivel de jerarquia es obligatorio',
            'password.required' =>'La clave es Obligatoria',
            'password.min'      =>'La clave debe tener mas de :min caracteres',
            'password.max'      =>'La clave debe tener menos de :max caracteres',
            'password.confirmed'=>'Las claves introducidas no coinciden',
        ];
    }
}
