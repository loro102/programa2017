<?php

use Illuminate\Database\Seeder;

class invoice extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('invoices')->insert([
            'file_id' => 1,
            'professional_id' => 1,
            'numfactura' => str_random(10),
            'descripcion' => str_random(10),
            'sinoriginal' => 1,
            'cuantia_factura' => str_random(10),
            'cuantia_cliente' => str_random(10),
            'cuantia_empresa' => str_random(10),
            'cuantia_indemnizacion'=> str_random(10),
            'emitirfactcomision' => str_random(10),
            'nofactporhonorarios' => str_random(10),
            'estadopago' => 1,
            'formapago' => 1,
            'estadocobro' => 1,
            'numpagare' => str_random(10),
            'fechapago'=> Carbon::now(),
            'fechacobro'=> Carbon::now(),
            'nota' => str_random(10),

        ]);
    }
}
