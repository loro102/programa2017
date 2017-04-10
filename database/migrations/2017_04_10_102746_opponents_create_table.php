<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OpponentsCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opponents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('codigo_postal');
            $table->string('telefono');
            $table->string('telefono2');
            $table->string('movil');
            $table->string('email');
            $table->date('fechanacimiento');
            $table->string('nif');
            $table->string('vehiculo');
            $table->string('conductor');
            $table->string('num_poliza');
            $table->string('refexpediente');
            $table->string('matricula');
            $table->integer('processor_id')->unsigned();
            $table->foreign('processor_id')->references('id')->on('processors');
            $table->string('propietario');
            $table->string('tomador');
            $table->text('apunte');
            $table->integer('file_id')->unsigned();
            $table->foreign('file_id')->references('id')->on('files');
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
        Schema::dropIfExists('opponents');
    }
}
