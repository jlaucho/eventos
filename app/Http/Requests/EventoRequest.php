<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventoRequest extends Request
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
            'nombre'    =>'required|min:4|max:100',
            'tipo_evento'   =>'required|min:4|max:200',
            'cant_participante' =>'required|numeric',
            'fecha_inicio'      =>'required|date',
            'fecha_fin'         =>'required|date'

        ];
    }
    public function messages()
    {
        return [
            'nombre.required'   =>'El Nombre del Evento es Obligatorio',
            'nombre.min'        =>'El nombre del evento debe contener mas de :min caracteres',
            'nombre.max'        =>'El nombre del evento debe contener mas de :max caracteres',
            'nombre.alpha'      =>'El Nombre del evento debe contener solo letras',
        ];
    }
}
