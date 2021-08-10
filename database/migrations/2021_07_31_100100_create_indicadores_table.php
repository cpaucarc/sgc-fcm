<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
            $table->id();
            $table->string('objetivo');
            $table->string('cod_ind_inicial');
            $table->string('cod_ind_final');
            $table->string('formula')->nullable();
            $table->smallInteger('minimo');
            $table->smallInteger('satisfactorio');
            $table->smallInteger('sobresaliente');
            $table->unsignedBigInteger('proceso_id');
            $table->unsignedBigInteger('unidad_medida_id');
            $table->unsignedBigInteger('frecuencia_id');
            $table->unsignedBigInteger('medicion_responsable_id')->nullable();
            $table->unsignedBigInteger('analisis_responsable_id')->nullable();
            $table->unsignedBigInteger('escuela_id')->nullable();
            $table->unsignedBigInteger('facultad_id');

            $table->foreign('proceso_id')->references('id')->on('procesos');
            $table->foreign('unidad_medida_id')->references('id')->on('unidad_medidas');
            $table->foreign('frecuencia_id')->references('id')->on('frecuencias');
            $table->foreign('medicion_responsable_id')->references('id')->on('entidades');
            $table->foreign('analisis_responsable_id')->references('id')->on('entidades');
            $table->foreign('escuela_id')->references('id')->on('escuelas');
            $table->foreign('facultad_id')->references('id')->on('facultades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicadores');
    }
}
