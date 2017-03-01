<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FilesAddFkProcessors extends Migration
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
            $table->integer('processor_id')->unsigned()->nullable();
            $table->foreign('processor_id')->references('id')->on('processors');
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
            $table->dropForeign(['processor_id']);
            $table->dropColumn('processor_id');
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        });
    }
}
