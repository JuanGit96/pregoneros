<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        
        $rules = [
            'razon_social' => 'required',
            'nit' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'web' => 'required',
        ];

        if ($this->request->has("this_update"))
            $rules["indicativo"] = 'required|unique:clients,indicativo,'.$this->request->all()["id"];
        else
            $rules["indicativo"] = 'required|unique:clients';

        return $rules;
    }

    public  function messages()
    {
        return [
            'razon_social.required' => 'El capo raón social es obligatorio',
            'nit.required' => 'el campo nit es obligatorio',
            'email.required' => 'el campo email es obligatorio',
            'telefono.required' => 'el campo telefono es obligatorio',
            'web.required' => 'el campo pagina web es obligatorio',
            'indicativo.required' => 'el campo indicativo es obligatorio',
            'unique.indicativo' => 'el indicativo seleccionado ya extiste,porfavor digita otro',
        ];
    }
}
