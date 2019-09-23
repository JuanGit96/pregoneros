<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
        if ($this->request->has('this_update'))
        {
            return [
                'approved' => 'required|boolean',
            ];
        }
        else
        {
            return [
                'opinion' => 'required',
                'lo_comprarias' => 'required|boolean',
                'why' => 'required',
                'approved' => 'nullable|boolean',
            ];
        }

    }

    public function messages()
    {
        return [
            'approved.required' => 'no sabemos si apruebas o desapruebas el registro',
            'approved.boolean' => 'El formato de tu respuesta no llega correctamente',
            'opinion.required' => 'El campo opinion es obligatorio',
            'lo_comprarias.boolean' => 'El formato del campo opinon no llega correctamente',
            'lo_comprarias.required' => 'El campo (lo comprarias) es obligatorio',
            'why.required' => 'El campo (¿por qué? es obligatorio)',
        ];
    }
}
