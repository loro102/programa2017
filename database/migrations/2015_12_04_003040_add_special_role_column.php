<?php

use Illuminate\Database\Migrations\Migration;

class AddSpecialRoleColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('roles', function ($table) {
            $table->enum('special', ['all-access', 'no-access'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('roles', function ($table) {
            $table->dropColumn('special');
        });
    }
}
