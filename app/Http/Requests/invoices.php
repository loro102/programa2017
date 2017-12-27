<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

Class Invoices extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
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
            'fechafact'=>'required',
            'file_id'=>'required',
            'honorario'=>'nullable',
            'professional_id'=>'required|not_in:0',
            'fechasupl'=>'nullable',
            'fechacontrafact'=>'nullable',
            'numfactura'=>'required',
            'numsuplido'=>'nullable',
            'numcontrafactura'=>'nullable',
            'descripcion'=>'required',
            'sinoriginal'=>'nullable',
            'cuantia_factura'=>'required',
            'cuantia_cliente'=>'required',
            'cuantia_empresa'=>'required',
            'cuantia_indemnizacion'=>'required',
            'emitirfactcomision'=>'nullable',
            'emitirfactporhonorarios'=>'nullable',
            'estadopago'=>'nullable',
            'formapago'=>'nullable',
            'estadocobro'=>'nullable',
            'numpagare'=>'nullable',
            'fechapago'=>'nullable',
            'fechacobro'=>'nullable',
            'nota'=>'nullable',
        ];
    }
    public function attributes()
    {
        return [
            'fechafact'=>'fecha de factura',
            'professional_id'=>'profesional',
            'fechasupl'=>'fecha de suplido',
            'fechacontrafact'=>'fecha de contrafactura',
            'numfactura'=>'numero de factura',
            'numsuplido'=>'numero de suplido',
            'numcontrafactura'=>'numero de contrafactura',
            'descripcion'=>'descripción',
            'cuantia_factura'=>'factura',
            'cuantia_cliente'=>'cliente',
            'cuantia_empresa'=>'empresa',
            'cuantia_indemnizacion'=>'indemnización',
            'estadopago'=>'estado de pago',
            'formapago'=>'forma de pago',
            'estadocobro'=>'estado de cobro',
            'numpagare'=>'numero de pagaré',
            'fechapago'=>'fecha de pago',
            'fechacobro'=>'fecha de cobro',
            'nota'=>'notas',
        ];
    }
}
