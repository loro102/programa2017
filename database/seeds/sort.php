<?php

use Illuminate\Database\Seeder;

Class Sort extends Seeder
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
            'nombre' => 'Accidente de trafico',
            'por_defecto' => 1,

        ]);
        DB::table('sorts')->insert([
            'nombre' => 'Consulta de abogado',
            'por_defecto' => 0,

        ]);
        DB::table('sorts')->insert([
            'nombre' => 'Otros',
            'por_defecto' => 0,

        ]);
        DB::table('sorts')->insert([
            'nombre' => 'Abono multas',
            'por_defecto' => 0,

        ]);
        DB::table('sorts')->insert([
            'nombre' => 'Abono Empresa',
            'por_defecto' => 1,

        ]);
        DB::table('sorts')->insert([
            'nombre' => 'Laboral',
            'por_defecto' => 1,

        ]);
        DB::table('sorts')->insert([
            'nombre' => 'Reclamaciones',
            'por_defecto' => 1,

        ]);
        DB::table('sorts')->insert([
            'nombre' => 'Daños materiales',
            'por_defecto'=>1,

        ]);
    }
}
