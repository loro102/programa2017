<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class customer extends Seeder
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
            'nombre' => str_random(10),
            'apellidos' => str_random(10),
            'nif' => str_random(10),
            'direccion' => str_random(10),
            'localidad' => str_random(10),
            'provincia' => str_random(10),
            'codigopostal' => str_random(10),
            'fechanacimiento' => Carbon::now(),
            'fechadealta' => Carbon::now(),
            'telefono1' => str_random(10),
            'telefono2' => str_random(10),
            'movil' => str_random(10),
            'email' => (str_random(10).'@gmail.com'),
            'iban' => str_random(10),
            'notas' => str_random(10),
            'agent_id'=>1,

        ]);
    }
}
