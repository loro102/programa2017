<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentsCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_documento')->nullable();
            $table->date('fecha_entrada')->nullable();
            $table->date('fecha_salida')->nullable();
            $table->string('remitente')->nullable();
            $table->string('destinatario')->nullable();
            $table->string('asunto')->nullable();
            $table->text('contenido')->nullable();
            $table->unsigned('file_id')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
