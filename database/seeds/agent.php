<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class agent extends Seeder
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
            'nombre' => str_random(10),
            'nif' => str_random(10),
            'direccion' => str_random(10),
            'localidad' => str_random(10),
            'provincia' => str_random(10),
            'codigo_postal' => str_random(10),
            'profesion' => str_random(10),
            'fecha_alta' => Carbon::now(),
            'telefono1' => str_random(10),
            'telefono2' => str_random(10),
            'movil' => str_random(10),
            'fax' => str_random(10),
            'email' => (str_random(10).'@gmail.com'),
            'iban' => str_random(10),
            'notas' => str_random(10),
            'placa'=>0,
            'pegatina'=>0,
            'portatriptico'=>0,
            'commercial_id'=>'1',
            ]);
    }
}
