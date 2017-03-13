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
            'nombre' => str_random(10),
            'telefono' => str_random(10),
            'telefono2' => str_random(10),
            'fax' => str_random(10),
            'email' => (str_random(10).'@gmail.com'),
            'notas' => str_random(10),
            'cargo'=>str_random(10),
            'insurer_id'=>1,


        ]);
    }
}
