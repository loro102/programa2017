<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

Class Tramicia extends FormRequest
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
            'telefono'=>'nullable',
            'telefono2'=>'nullable',
            'fax'=>'nullable',
            'email'=>'nullable',
            'notas'=>'nullable',
            'cargo'=>'nullable',
            'insurer_id'=>'required',
        ];
    }
}
