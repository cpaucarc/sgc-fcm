<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesis', function (Blueprint $table) {
            $table->id();
            $table->string('numero_registro')->unique();
            $table->text('titulo');
            $table->string('anio', 4);
            $table->unsignedBigInteger('asesor_id');
            $table->unsignedBigInteger('tipo_tesis_id');
            $table->foreign('asesor_id')->references('id')->on('asesores');
            $table->foreign('tipo_tesis_id')->references('id')->on('tipo_tesis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tesis');
    }
}
