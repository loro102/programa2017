<?php

use Illuminate\Database\Seeder;

class sort extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sorts')->insert([
            'nombre' => 'accidente de trafico',
            'por_defecto'=>1,

        ]);
    }
}
