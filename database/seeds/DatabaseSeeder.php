<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(agent::class);
        $this->call(group::class);
        $this->call(professional::class);
        $this->call(customer::class);
        $this->call(sort::class);
        $this->call(formality::class);
        $this->call(insurer::class);
        $this->call(processor::class);
        $this->call(file::class);
        $this->call(invoice::class);
        $this->call(phases::class);
    }
}
