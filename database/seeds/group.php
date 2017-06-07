<?php

use Illuminate\Database\Seeder;

class group extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('groups')->insert([
            'nombre' => 'Abogados',
        ]);
        DB::table('groups')->insert([
                                        'nombre' => 'Médicos',
                                    ]);
        DB::table('groups')->insert([
                                        'nombre' => 'Fisioterapia',
                                    ]);
        DB::table('groups')->insert([
                                        'nombre' => 'Clínica/Hospital',
                                    ]);
        DB::table('groups')->insert([
                                        'nombre' => 'Perito Ingeniero',
                                    ]);
        DB::table('groups')->insert([
                                        'nombre' => 'Perito Médico',
                                    ]);
        DB::table('groups')->insert([
                                        'nombre' => 'Procurador',
                                    ]);
        DB::table('groups')->insert([
                                        'nombre' => 'Taxi',
                                    ]);
        DB::table('groups')->insert([
                                        'nombre' => 'Ambulancia',
                                    ]);
    }
}
