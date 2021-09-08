<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSustentacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sustentaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_sustentacion')->nullable();
            $table->unsignedBigInteger('tesis_id');
            $table->unsignedBigInteger('escuela_id');
            $table->unsignedBigInteger('ciclo_id');
            $table->unsignedBigInteger('declaracion_id');
            $table->foreign('tesis_id')->references('id')->on('tesis');
            $table->foreign('escuela_id')->references('id')->on('escuelas');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->foreign('declaracion_id')->references('id')->on('declaraciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sustentaciones');
    }
}
