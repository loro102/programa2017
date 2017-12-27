<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

Class Agent extends FormRequest
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
    /**
     * Validate a CIFNIF code
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return mixed
     */


    public function rules()
    {
        return [
            //
            'nombre'=>'Required',
            'nif'=>'Required|Unique:agents',
            'direccion'=>'nullable|max:255',
            'codigo_postal'=>'nullable|max:5',
            'localidad'=>'nullable|max:255',
            'provincia'=>'nullable|max:255',
            'profesion'=>'nullable|max:255',
            'fecha_alta'=>'nullable|date|max:255',
            'telefono2'=>'nullable|max:255',
            'movil'=>'nullable|max:255',
            'fax'=>'nullable|max:255',
            'email'=>'nullable|max:255|email',
            'commercial_id'=>'integer|nullable|max:255',
            'notas'=>'nullable',
            'placa'=>'boolean',
            'pegatina'=>'boolean',
            'portatriptico'=>'boolean',
            'iban'=>'nullable|iban',
        ];
    }
    public function messages()
    {
        return [
            'nif.cifnif'  => 'El cif o nif no es valido',
        ];
    }
}
