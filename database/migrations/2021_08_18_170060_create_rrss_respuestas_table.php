<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRRSSRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrss_respuestas', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('respuesta');
            $table->unsignedBigInteger('pregunta_id');
            $table->unsignedBigInteger('rrss_encuestado_id');

            $table->foreign('pregunta_id')->references('id')->on('preguntas');
            $table->foreign('rrss_encuestado_id')->references('id')->on('rrss_encuestados');
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
        Schema::dropIfExists('rrss_respuestas');
    }
}
