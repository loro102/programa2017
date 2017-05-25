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
                'nombre' =>'Conociendo el caso',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Pendiente de Designación de Abogado',
            ]);
        DB::table('phases')->insert(
            [

                'nombre' =>'En Tramitación',
            ]);
        DB::table('phases')->insert(
            [

                'nombre' =>'En poder del Técnico',
            ]);
        DB::table('phases')->insert(
            [

                'nombre' =>'Pendiente de Facturas',
            ]);
        DB::table('phases')->insert(
            [
                                'nombre' =>'Pendiente de Informe Forense',
            ]);
        DB::table('phases')->insert(
            [
                                'nombre' =>'Negociación',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Pendiente de Interponer Demanda',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Pendiente de Juicio',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Pendiente de Respuesta Motivada',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Pendiente de Resolución',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Pendiente de Apelación',
            ]);
        DB::table('phases')->insert(
            [

                'nombre' =>'Pendiente de Talón',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Pendiente de Cobro Cliente',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Pendiente de Cobro Empresa',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Pendiente de Pago a Profesionales',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Pendiente de Asistencia Jurídica',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Pendiente de Cobro de Asistencia Jurídica',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Asistencia Jurídica Demandada',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Archivado',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Monitorio',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'No llegó a Buen Puerto',
            ]);
        DB::table('phases')->insert(
            [
                'nombre' =>'Incobrado',
            ]);
    }
}
