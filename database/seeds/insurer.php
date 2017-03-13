<?php

use Illuminate\Database\Seeder;

class insurer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('insurers')->insert([
            'nombre' => str_random(10),
            'telefonos' => str_random(10),
            'faxes' => str_random(10),
            'emails' => (str_random(10).'@gmail.com'),
            'direccion' => str_random(10),
            'codigo_postal' => str_random(10),
            'localidad' => str_random(10),
            'provincia' => str_random(10),
            'notas' => str_random(10),


        ]);
    }
}
