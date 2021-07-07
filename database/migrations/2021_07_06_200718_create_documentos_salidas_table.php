<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_salidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_salida_id');
            $table->unsignedBigInteger('documento_id');

            $table->foreign('cliente_salida_id')->references('id')->on('cliente_salidas');
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
        Schema::dropIfExists('documentos_salidas');
    }
}
