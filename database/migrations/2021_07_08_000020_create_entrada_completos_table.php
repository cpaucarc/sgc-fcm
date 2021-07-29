<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaCompletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_completos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_operacion')->useCurrent();
            $table->unsignedBigInteger('entrada_proveedor_id');
            $table->unsignedBigInteger('ciclo_id');
            $table->unsignedBigInteger('documento_id');

            $table->foreign('entrada_proveedor_id')->references('id')->on('entrada_proveedores');
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
        Schema::dropIfExists('entrada_completos');
    }
}
