<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PregonRequest extends FormRequest
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
        if(isset($this->request->all()["moduleStatus"]))
        {
            return [
                'moduleStatus' => 'required',
            ];
        }
        
        return [
            'identificador_pregon' => 'required',
            'beneficio_redime' => 'nullable',
            'objetivo' => 'required',
            'pago' => 'required',
            'fecha_limite' => 'required',
            'pregon' => 'required',
            'experiencia' => 'required',
            'evidencia' => 'required',
            'campaign_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'identificador_pregon.required' => 'no hemos podido generar el identificador del pregon',
            //'beneficio_redime.required' => 'el campo beneficio para redimir es obligatorio',
            'objetivo.required' => 'el campo objetivo es obligatorio',
            'pago.required' => 'el campo pago es obligatorio',
            'fecha_limite.required' => 'el campo fecha limite es obligatorio',
            'pregon.required' => 'el campo pregon es obligatorio',
            'experiencia.required' => 'el campo experiencia es obligatorio',
            'evidencia.required' => 'el campo evidencia es obligatorio',
            'campaign_id.required' => 'no empo podido capturar el id de la campaña',
        ];
    }
}
