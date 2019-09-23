<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
            'object' => 'required',
            'code' => 'required',
            'budget' => 'required',
            'scope' => 'required',
            'client_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'object.required' => 'El campo "Objeto" es obligatorio',
            'code.required' => 'El campo "Código" es obligatorio',
            'budget.required' => 'El campo "Presupuesto" es obligatorio',
            'scope.required' => 'El campo "alcance" es obligatorio',
            'client_id.required' => 'El campo cliente es obligatorio',
        ];
    }
}
