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
            'Nombre' => 'Rumbo Juridico',
            'num_colegiado' => 'no tiene',
            'nif' => 'meter a mano',
            'especialidad' => 'no tiene',
            'direccion' => 'no tiene',
            'localidad' => 'no tiene',
            'provincia' => 'no tiene',
            'codigo_postal' => 'no tiene',
            'telefono1' => 'no tiene',
            'telefono2' => 'no tiene',
            'telefono3' => 'no tiene',
            'movil' => 'no tiene',
            'fax' => 'no tiene',
            'email' => 'no tiene',
            'iban' => 'no tiene',
            'notas' => 'no tiene',
            'acuerdo_pago' => 0,
            'indemnizacion' => 0,
            'homologado' => 0,
            'activo'=>1,

        ]);
    }
}
