<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoicesCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechafact')->required();
            $table->integer('file_id')->unsigned();
            $table->foreign('file_id')->references('id')->on('files');
            $table->boolean('honorario')->default(false);
            $table->integer('professional_id')->unsigned();
            $table->foreign('professional_id')->references('id')->on('professionals');
            //$table->integer('group_id')->unsigned();
            //$table->foreign('group_id')->references('id')->on('groups');
            $table->string('numfactura');
            $table->string('descripcion');
            $table->boolean('sinoriginal');
            $table->string('cuantia_factura')->default('0');
            $table->string('cuantia_cliente')->default('0');
            $table->string('cuantia_empresa')->default('0');
            $table->string('cuantia_indemnizacion')->default('0');
            $table->boolean('emitirfactcomision');
            $table->boolean('nofactporhonorarios');
            $table->integer('estadopago');
            $table->integer('formapago');
            $table->integer('estadocobro');
            $table->string('numpagare');
            $table->date('fechapago');
            $table->date('fechacobro');
            $table->text('nota');
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
        Schema::dropIfExists('invoices');
    }
}
