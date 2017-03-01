<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FilesCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('solicitor_id')->nullable();
            //$table->foreign('solicitor_id')->references('id')->on('users');
            //Datos expediente
            $table->date('fechaapertura');
            $table->date('fechacierre')->nullable();
            $table->date('fechacobrocliente')->nullable();
            $table->date('fechacobroempresa')->nullable();
            $table->date('fechallegadatalon')->nullable();
            $table->date('fechaarchivo')->nullable();
            $table->integer('caso_tipo')->nullable();
            //$table->integer('sort_file_id')->unsigned();
            //$table->foreign('sort_file_id')->references('id')->on('sort_files');
            //otros datos
            $table->date('fecha_accidente')->nullable();
            $table->time('hora_accidente')->nullable();
            $table->date('fecha_baja_laboral')->nullable();
            $table->date('fecha_alta_laboral')->nullable();
            $table->date('fecha_ingreso_hospital')->nullable();
            $table->date('fecha_alta_hospital')->nullable();
            $table->date('fecha_alta_direccion_medica')->nullable();
            $table->string('desarrollo_suceso')->nullable();
            $table->string('lugar')->nullable();
            $table->string('localidad')->nullable();
            $table->text('descripcion_expediente')->nullable();
            $table->string('condicion')->nullable();
            $table->string('danos_vehiculo')->nullable();
            $table->string('danos_materiales')->nullable();
            $table->string('danos_personales')->nullable();
            $table->string('cuantia_asistencia_juridica')->nullable();
            $table->string('cuantia_asistencia_sanitaria')->nullable();
            $table->boolean('firma_carta_abogado')->nullable();
            $table->date('fecha_designacion')->nullable();
            $table->date('fecha_reclamacion_aj')->nullable();
            $table->date('fecha_cobro_aj')->nullable();
            //Datos Juridicos
            $table->date('fechaofertamotivada')->nullable();
            $table->date('fecharespuestamotivada')->nullable();
            $table->boolean('respuestamotivadaaceptada')->nullable();
            //$table->integer('formality_id')->unsigned()->nullable();
            //$table->foreign('formality_id')->reference('id')->on('formalities');
            $table->string('numero_procedimiento')->nullable();
            $table->string('diligencias_previas')->nullable();
            $table->date('fecha_denuncia')->nullable();
            $table->date('fecha_demanda')->nullable();
            $table->date('fecha_audienciaprevia')->nullable();
            $table->date('fecha_juicio')->nullable();

            //Datos vehiculo
            $table->string('vehiculo')->nullable();
            $table->string('matricula')->nullable();
            $table->string('conductor')->nullable();
            $table->string('tomador')->nullable();
            $table->string('numero_poliza')->nullable();
            $table->string('ref_expediente')->nullable();
            //$table->integer('insurer_id')->nullable();
            //$table->foreign('insurer_id')->references('id')->on('insurers');
            $table->date('fechapoliza')->nullable();
            $table->date('finfechapoliza')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('estimacion')->nullable();
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
        Schema::dropIfExists('files');
    }
}
