<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class file extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->insert([
            'customer_id' =>1,
            'solicitor_id' =>1,
            'fechaapertura' => Carbon::now(),
            'fechacierre' => Carbon::now(),
            'fechacobrocliente' => Carbon::now(),
            'fechacobroempresa' => Carbon::now(),
            'fechallegadatalon' => Carbon::now(),
            'fechaarchivo' => Carbon::now(),
            'caso_tipo' => 1,
            'fecha_accidente' => Carbon::now(),
            'hora accidente' => Carbon::now()->toTimeString(),
            'fecha_baja_laboral' => Carbon::now(),
            'fecha_alta_laboral' => Carbon::now(),
            'fecha_ingreso_hospital' => Carbon::now(),
            'fecha_alta_hospital' => Carbon::now(),
            'fecha_alta_direccion_medica' => Carbon::now(),
            'desarrollo_suceso' => str_random(10),
            'lugar' => str_random(10),
            'localidad' => str_random(10),
            'descripcion_expediente' => (str_random(10).'@gmail.com'),
            'condicion' => str_random(10),
            'danos_vehiculo' => str_random(10),
            'danos_materiales'=>str_random(10),
            'danos_personales'=>str_random(10),
            'cuantia_asistencia_juridica'=>str_random(10),
            'cuantia_asistencia_sanitaria'=>str_random(10),
            'firma_carta_abogado'=>1,
            'fecha_designacion' => Carbon::now(),
            'fecha_reclamacion_aj' => Carbon::now(),
            'fecha_cobro_aj' => Carbon::now(),
            'fechaofertamotivada' => Carbon::now(),
            'fecharespuestamotivada' => Carbon::now(),
            'respuestamotivadaaceptada'=>1,
            'numero_procedimiento'=>str_random(10),
            'diligencias_previas'=>str_random(10),
            'fecha_denuncia' => Carbon::now(),
            'fecha_demanda' => Carbon::now(),
            'fecha_audienciaprevia' => Carbon::now(),
            'fecha_juicio' => Carbon::now(),
            'vehiculo'=>str_random(10),
            'matricula'=>str_random(10),
            'conductor'=>str_random(10),
            'tomador'=>str_random(10),
            'numero_poliza'=>str_random(10),
            'ref_expediente'=>str_random(10),
            'fechapoliza' => Carbon::now(),
            'finfechapoliza' => Carbon::now(),
            'descripcion'=>str_random(10),
            'estimacion'=>str_random(10),
            'sort_id'=>1,
            'formality_id'=>1,
            'insurer_id'=>1,
            'processor_id'=>str_random(10),

        ]);
    }
}
