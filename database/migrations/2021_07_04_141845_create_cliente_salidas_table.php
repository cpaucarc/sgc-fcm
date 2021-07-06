<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_salidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('salida_id');
            $table->unsignedBigInteger('actividad_id');

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('salida_id')->references('id')->on('salidas');
            $table->foreign('actividad_id')->references('id')->on('actividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_salidas');
    }
}
