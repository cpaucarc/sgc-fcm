<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaCompletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_completos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_operacion')->useCurrent();
            $table->unsignedBigInteger('salida_id');
            $table->unsignedBigInteger('ciclo_id');
            $table->unsignedBigInteger('documento_id');

            $table->foreign('salida_id')->references('id')->on('salidas');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
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
        Schema::dropIfExists('salida_completos');
    }
}
