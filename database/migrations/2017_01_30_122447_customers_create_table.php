<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomersCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->string('apellidos',255);
            //$table->integer('agent_id')->unsigned();
            //$table->foreign('agent_id')->references('id')->on('agents');
            $table->string('nif')->unique();
            $table->string('direccion',255);
            $table->string('localidad',255);
            $table->string('provincia');
            $table->string('codigopostal');
            $table->date('fechanacimiento');
            $table->date('fechadealta');
            $table->string('telefono1');
            $table->string('telefono2');
            $table->string('movil');
            $table->string('email');
            $table->string('iban');
            $table->text('notas');
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
        Schema::dropIfExists('customers');
    }
}
