<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoConvalidacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_convalidacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solicitud_convalidacion_id');
            $table->unsignedBigInteger('requisito_id');
            $table->unsignedBigInteger('documento_id');
            $table->timestamps();

            $table->foreign('solicitud_convalidacion_id')->references('id')->on('solicitud_convalidacion');
            $table->foreign('requisito_id')->references('id')->on('requisitos');
            $table->foreign('documento_id')->references('id')->on('documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento_convalidacion');
    }
}
