<?php

use Illuminate\Database\Seeder;

Class Insurer extends Seeder
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
            'nombre' => 'Ninguno',
            'telefonos' => 'Ninguno',
            'faxes' => 'Ninguno',
            'emails' => 'Ninguno',
            'direccion' => 'Ninguno',
            'codigo_postal' => 'Ninguno',
            'localidad' => 'Ninguno',
            'provincia' => 'Ninguno',
            'notas' => 'Ninguno',


        ]);
    }
}
