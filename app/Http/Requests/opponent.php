<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class opponent extends FormRequest
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
            'nombre'=>'required',
            'direccion'=>'nullable',
            'localidad'=>'nullable',
            'provincia'=>'nullable',
            'codigo_postal'=>'numeric|nullable',
            'telefono'=>'numeric|nullable',
            'telefono2'=>'numeric|nullable',
            'movil'=>'numeric|nullable',
            'email'=>'email|nullable',
            'fechanacimiento'=>'nullable',
            'nif'=>'nullable',
            'vehiculo'=>'nullable',
            'conductor'=>'nullable',
            'num_poliza'=>'nullable',
            'refexpediente'=>'nullable',
            'matricula'=>'nullable',
            'processor_id'=>'nullable',
            'propietario'=>'nullable',
            'tomador'=>'nullable',
            'apunte'=>'nullable',
            'posible_culpable'=>'nullable'
            //
        ];
    }
}
