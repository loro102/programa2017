<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgentsCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('nif');
            $table->string('direccion');
            $table->string('codigo_postal');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('profesion');
            $table->string('fecha_alta');
            $table->string('telefono1');
            $table->string('telefono2');
            $table->string('movil');
            $table->string('fax');
            $table->string('email');
            $table->integer('commercial_id')->unsigned();
            //$table->foreign('commercial_id')->references('id')->on('commercials');
            $table->text('notas');
            $table->boolean('placa')->nullable();
            $table->boolean('pegatina')->nullable();
            $table->boolean('portatriptico')->nullable();
            $table->string('iban');
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
        Schema::dropIfExists('agents');
    }
}
