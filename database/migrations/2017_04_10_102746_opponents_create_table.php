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
            $table->string('nombre')->nullable();
            $table->string('direccion')->nullable();
            $table->string('localidad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('movil')->nullable();
            $table->string('email')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('nif')->nullable();
            $table->string('vehiculo')->nullable();
            $table->string('conductor')->nullable();
            $table->string('num_poliza')->nullable();
            $table->string('refexpediente')->nullable();
            $table->string('matricula')->nullable();
            $table->integer('processor_id')->unsigned();
            $table->foreign('processor_id')->references('id')->on('processors');
            $table->string('propietario')->nullable();
            $table->string('tomador')->nullable();
            $table->text('apunte')->nullable();
            $table->integer('file_id')->unsigned();
            $table->foreign('file_id')->references('id')->on('files');
            $table->boolean('posible_culpable')->nullable();
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
