<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FilesAddFkFormalities extends Migration
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
            $table->integer('formality_id')->unsigned()->nullable();
            $table->foreign('formality_id')->references('id')->on('formalities');
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
            $table->dropForeign(['formality_id']);
            $table->dropColumn('formality_id');
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        });
    }
}
