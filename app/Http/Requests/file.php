<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class file extends FormRequest
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
            //representado
            'nombre'=>'nullable',
            'fechanacimiento'=>'nullable',
            'nif'=>'nullable',
            'customer_id'=>'required',
            'solicitor_id'=>'required',
            'fechaapertura'=>'required',
            'fechacierre'=>'nullable',
            'fechacobrocliente'=>'nullable',
            'fechacobroempresa'=>'nullable',
            'fechallegadatalon'=>'nullable',
            'fechaarchivo'=>'nullable',
            'caso_tipo'=>'nullable',
            'fecha_accidente'=>'required',
            'hora_accidente'=>'required',
            'fecha_baja_laboral'=>'nullable',
            'fecha_alta_laboral'=>'nullable',
            'fecha_ingreso_hospital'=>'nullable',
            'fecha_alta_hospital'=>'nullable',
            'fecha_alta_direccion_medica'=>'nullable',
            'fecha_alta_forense'=>'nullable',
            'desarrollo_suceso'=>'nullable',
            'lugar'=>'nullable',
            'localidad'=>'nullable',
            'descripcion_expediente'=>'nullable',
            'condicion'=>'nullable',
            'danos_vehiculo'=>'nullable',
            'danos_personales'=>'nullable',
            'cuantia_asistencia_juridica'=>'nullable',
            'cuantia_asistencia_sanitaria'=>'nullable',
            'firma_carta_abogado'=>'nullable',
            'fecha_designacion'=>'nullable',
            'fecha_reclamacion_aj'=>'nullable',
            'fecha_cobro_aj'=>'nullable',
            'fechaofertamotivada'=>'nullable',
            'fecharespuestamotivada'=>'nullable',
            'respuestamotivadaaceptada'=>'nullable',
            'numero_procedimiento'=>'nullable',
            'diligencias_previas'=>'nullable',
            'fecha_denuncia'=>'nullable',
            'fecha_demanda'=>'nullable',
            'fecha_audiencia_previa'=>'nullable',
            'fecha_juicio'=>'nullable',
            'vehiculo'=>'nullable',
            'matricula'=>'nullable',
            'conductor'=>'nullable',
            'tomador'=>'nullable',
            'numero_poliza'=>'nullable',
            'ref_expediente'=>'nullable',
            'fechapoliza'=>'nullable',
            'finfechapoliza'=>'nullable',
            'decripcion'=>'nullable',
            'estimacion'=>'nullable',
            'sort_id'=>'required',
            'formality_id'=>'nullable',
            'insurer_id'=>'nullable',
            'processor_id'=>'nullable',
            'phase_id'=>'nullable',
            'nombre'=>'nullable',
            'nif'=>'nullable',
            'fechanacimiento'=>'nullable',
                        
        ];
    }
}
