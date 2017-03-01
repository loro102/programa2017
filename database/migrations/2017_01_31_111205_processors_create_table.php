<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProcessorsCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processors', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('insurer_id')->unsigned();
            //$table->foreign('insurer_id')->references('id')->on('insurers');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('telefono2');
            $table->string('fax');
            $table->string('email');
            $table->text('notas');
            $table->string('cargo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processors');
    }
}
