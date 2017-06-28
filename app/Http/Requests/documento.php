<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

Class Documento extends FormRequest
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
            //
            'fecha_documento'=>'required',
            'fecha_entrada'=>'nullable',
            'fecha_salida'=>'nullable',
            'remitente'=>'nullable',
            'destinatario'=>'nullable',
            'asunto'=>'required',
            'contenido'=>'nullable',
        ];
    }
}
