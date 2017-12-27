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
        $this->call(Agent::class);
        $this->call(Group::class);
        $this->call(Professional::class);
        $this->call(Sort::class);
        $this->call(Formality::class);
        $this->call(Insurer::class);
        $this->call(Processor::class);
        $this->call(Phases::class);
        $this->call(Rolespermisos::class);

    }
}
