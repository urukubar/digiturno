<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTurnoUsuariosRequest extends FormRequest
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
          'cedula' => ['required', 'max:10'],
          'opcion_caja_tramite' => ['required']
        ];
    }

    public function messages()
    {
      return [
        'cedula.required'=>'Por favor, digita tu cedula.',
        'cedula.max'=>'Tu cedula no puede superar los 10 caracteres.',
        'opcion_caja_tramite'=>'Por favor, digita tu opción de tramite'
      ];
    }
}
