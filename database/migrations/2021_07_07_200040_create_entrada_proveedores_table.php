<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_proveedores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('actividad_id');
            $table->unsignedBigInteger('entrada_id');

            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->foreign('actividad_id')->references('id')->on('actividades');
            $table->foreign('entrada_id')->references('id')->on('entradas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrada_proveedores');
    }
}
