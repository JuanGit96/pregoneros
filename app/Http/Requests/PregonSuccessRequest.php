<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PregonSuccessRequest extends FormRequest
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
            'approved' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'approved.required' => 'El status del registro no pudo ser capturado',
            'approved.boolean' => 'El status del registro no llega con el formato adecuado',
        ];
    }
}
