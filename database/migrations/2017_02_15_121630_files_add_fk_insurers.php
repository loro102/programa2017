<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FilesAddFkInsurers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('files', function($table)
        {
            $table->integer('insurer_id')->unsigned()->nullable();
            $table->foreign('insurer_id')->references('id')->on('insurers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('files', function($table)
        {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            $table->dropForeign(['insurer_id']);
            $table->dropColumn('insurer_id');
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        });
    }
}
