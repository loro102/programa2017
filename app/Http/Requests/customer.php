<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class customer extends FormRequest
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
            'nombre'=>'required',
            'apellidos'=>'required',
            'nif'=>'Required|Unique:customers,nif|',
            'direccion'=>'nullable',
            'localidad'=>'nullable',
            'provincia'=>'nullable',
            'codigopostal'=>'nullable',
            'fechanacimiento'=>'nullable',
            'fechadealta'=>'nullable',
            'telefono1'=>'nullable',
            'telefono2'=>'nullable',
            'movil'=>'nullable',
            'email'=>'nullable|email',
            'iban'=>'nullable',
            'notas'=>'nullable',
        ];
    }
}
