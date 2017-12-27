<?php

use Illuminate\Database\Seeder;

Class Formality extends Seeder
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
        'nombre' => 'ninguno',
        'categoria' => 'ninguno',
    ]);

    }
}
