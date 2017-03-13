<?php

use Illuminate\Database\Seeder;

class formality extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('formalities')->insert([
        'nombre' => str_random(10),
        'categoria' => str_random(10),
    ]);

    }
}
