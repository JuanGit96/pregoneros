<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'pregunta' => 'required',
            'respuesta' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pregunta.required' => 'El campo pregunta es obligatorio',
            'respuesta.required' => 'el campo respuesta es obligatorio',
        ];
    }
}
