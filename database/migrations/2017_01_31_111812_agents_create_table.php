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
            $table->string('direccion')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('localidad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('profesion')->nullable();
            $table->string('fecha_alta')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('movil')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->integer('commercial_id')->unsigned();
            //$table->foreign('commercial_id')->references('id')->on('commercials');
            $table->text('notas')->nullable();
            $table->boolean('placa')->nullable();
            $table->boolean('pegatina')->nullable();
            $table->boolean('portatriptico')->nullable();
            $table->string('iban')->nullable();
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
