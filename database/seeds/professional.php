<?php

use Illuminate\Database\Seeder;

class professional extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('professionals')->insert([
            'group_id' => 1,
            'Nombre' => str_random(10),
            'num_colegiado' => str_random(10),
            'nif' => str_random(10),
            'especialidad' => str_random(10),
            'direccion' => str_random(10),
            'localidad' => str_random(10),
            'provincia' => str_random(10),
            'codigo_postal' => str_random(10),
            'telefono1' => str_random(10),
            'telefono2' => str_random(10),
            'telefono3' => str_random(10),
            'movil' => str_random(10),
            'fax' => str_random(10),
            'email' => (str_random(10).'@gmail.com'),
            'iban' => str_random(10),
            'notas' => str_random(10),
            'acuerdo_pago' => str_random(10),
            'indemnizacion' => 1,
            'homologado' => 1,
            'activo'=>1,

        ]);
    }
}
