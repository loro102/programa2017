<?php

use Illuminate\Database\Seeder;

class phases extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('phases')->insert(
            [
                'id' =>0,
                'nombre' =>'Conociendo el caso',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>1,
                'nombre' =>'Pendiente de Designación de Abogado',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>2,
                'nombre' =>'En Tramitación',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>3,
                'nombre' =>'En poder del Técnico',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>4,
                'nombre' =>'Pendiente de Facturas',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>5,
                'nombre' =>'Pendiente de Informe Forense',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>6,
                'nombre' =>'Negociación',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>7,
                'nombre' =>'Pendiente de Interponer Demanda',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>8,
                'nombre' =>'Pendiente de Juicio',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>9,
                'nombre' =>'Pendiente de Respuesta Motivada',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>10,
                'nombre' =>'Pendiente de Resolución',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>11,
                'nombre' =>'Pendiente de Apelación',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>12,
                'nombre' =>'Pendiente de Talón',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>13,
                'nombre' =>'Pendiente de Cobro Cliente',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>14,
                'nombre' =>'Pendiente de Cobro Empresa',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>15,
                'nombre' =>'Pendiente de Pago a Profesionales',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>16,
                'nombre' =>'Pendiente de Asistencia Jurídica',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>17,
                'nombre' =>'Pendiente de Cobro de Asistencia Jurídica',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>18,
                'nombre' =>'Asistencia Jurídica Demandada',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>19,
                'nombre' =>'Archivado',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>20,
                'nombre' =>'Monitorio',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>21,
                'nombre' =>'No llegó a Buen Puerto',
            ]);
        DB::table('phases')->insert(
            [
                'id' =>22,
                'nombre' =>'Incobrado',
            ]);
    }
}
