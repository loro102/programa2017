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
            $table->string('Nombre')->nullable();
            $table->string('num_colegiado')->nullable();
            $table->string('nif')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('localidad')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('provincia')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('telefono3')->nullable();
            $table->string('movil')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('iban')->nullable();
            $table->text('notas')->nullable();
            $table->text('acuerdo_pago')->nullable();
            $table->boolean('indemnizacion')->nullable();
            $table->boolean('homologado')->nullable();
            $table->boolean('activo')->nullable();
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
