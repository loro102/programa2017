<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfessionalsCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            //$table->foreign('group_id')->references('id')->on('groups');
            $table->string('Nombre');
            $table->string('num_colegiado');
            $table->string('nif');
            $table->string('especialidad');
            $table->string('direccion');
            $table->string('localidad');
            $table->string('codigo_postal');
            $table->string('provincia');
            $table->string('telefono1');
            $table->string('telefono2');
            $table->string('telefono3');
            $table->string('movil');
            $table->string('fax');
            $table->string('email');
            $table->string('iban');
            $table->text('notas');
            $table->integer('acuerdo_pago');
            $table->boolean('indemnizacion');
            $table->boolean('homologado');
            $table->boolean('activo');
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
        Schema::dropIfExists('professionals');
    }
}
