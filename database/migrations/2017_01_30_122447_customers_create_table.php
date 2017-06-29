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
            $table->string('nif')->unique();
            $table->string('direccion',255)->nullable();
            $table->string('localidad',255)->nullable();
            $table->string('provincia')->nullable();
            $table->string('codigopostal')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->date('fechadealta')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('movil')->nullable();
            $table->string('email')->nullable();
            $table->string('iban')->nullable();
            $table->text('notas')->nullable();
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
