<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entrada_proveedor_id');
            $table->unsignedBigInteger('documento_id');

            $table->foreign('entrada_proveedor_id')->references('id')->on('entrada_proveedores');
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
        Schema::dropIfExists('documentos_entradas');
    }
}
