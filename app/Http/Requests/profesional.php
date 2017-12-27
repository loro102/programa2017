<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

Class Profesional extends FormRequest
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
            'group_id'=>'required',
            'Nombre'=>'required',
            'num_colegiado'=>'nullable',
            'nif'=>'required',
            'especialidad'=>'nullable',
            'direccion'=>'nullable',
            'localidad'=>'nullable',
            'codigo_postal'=>'nullable',
            'provincia'=>'nullable',
            'telefono1'=>'nullable',
            'telefono2'=>'nullable',
            'telefono3'=>'nullable',
            'movil'=>'nullable',
            'fax'=>'nullable',
            'email'=>'nullable',
            'iban'=>'nullable',
            'notas'=>'nullable',
            'acuerdo_pago'=>'nullable',
            'indemnizacion'=>'nullable',
            'homologado'=>'nullable',
            'activo'=>'nullable',


        ];
    }
}
