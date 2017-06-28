<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

Class Agent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('agents')->insert([
            'nombre' => 'Rumbo Jurídico',
            'nif' => '',
            'direccion' => 'C/ Vizcaya,22',
            'localidad' => 'La Coruña',
            'provincia' => 'La Coruña',
            'codigo_postal' => '15007',
            'profesion' => '',
            'fecha_alta' => Carbon::now(),
            'telefono1' => '981245231',
            'telefono2' => '',
            'movil' => '',
            'fax' => '981140400',
            'email' => 'info@rumbojuridico.com',
            'iban' => '',
            'notas' => '',
            'placa'=>0,
            'pegatina'=>0,
            'portatriptico'=>0,
            'commercial_id'=>'1',
            ]);
    }
}
