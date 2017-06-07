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
            $table->date('fechasupl')->nullable();
            $table->date('fechacontrafact')->nullable();
            $table->string('numfactura')->nullable();
            $table->string('numsuplido')->nullable();
            $table->string('numcontrafactura')->nullable();
            $table->string('descripcion')->nullable();
            $table->boolean('sinoriginal')->nullable();
            $table->string('cuantia_factura')->default('0')->nullable();
            $table->string('cuantia_cliente')->default('0')->nullable();
            $table->string('cuantia_empresa')->default('0')->nullable();
            $table->string('cuantia_indemnizacion')->default('0')->nullable();
            $table->boolean('emitirfactcomision')->nullable();
            $table->boolean('emitirfactporhonorarios')->nullable();
            $table->integer('estadopago')->nullable();
            $table->integer('formapago')->nullable();
            $table->integer('estadocobro')->nullable();
            $table->string('numpagare')->nullable();
            $table->date('fechapago')->nullable();
            $table->date('fechacobro')->nullable();
            $table->text('nota')->nullable();
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
