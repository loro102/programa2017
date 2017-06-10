<?php

use Illuminate\Database\Seeder;

class processor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('processors')->insert([
            'nombre' => 'ninguno',
            'telefono' => 'ninguno',
            'telefono2' => 'ninguno',
            'fax' => 'ninguno',
            'email' => 'ninguno',
            'notas' => 'ninguno',
            'cargo'=>'ninguno',
            'insurer_id'=>1,


        ]);
    }
}
