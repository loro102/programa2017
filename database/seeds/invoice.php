<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            'fechafact'=> Carbon::now(),
            'numfactura' => str_random(10),
            'descripcion' => str_random(10),
            'sinoriginal' => 1,
            'cuantia_factura' => 15,
            'cuantia_cliente' => 0,
            'cuantia_empresa' => 5,
            'cuantia_indemnizacion'=> 15,
            'emitirfactcomision' => 1,
            'nofactporhonorarios' => 1,
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
