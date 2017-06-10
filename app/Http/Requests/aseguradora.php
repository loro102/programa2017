<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class aseguradora extends FormRequest
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
            'telefonos'=>'nullable',
            'faxes'=>'nullable',
            'email'=>'nullable|email',
            'direccion'=>'nullable',
            'localidad'=>'nullable',
            'provincia'=>'nullable',
            'codigopostal'=>'nullable',
            'notas'=>'nullable',
        ];
    }
}
