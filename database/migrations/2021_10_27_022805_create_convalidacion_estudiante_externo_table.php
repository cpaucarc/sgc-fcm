<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvalidacionEstudianteExternoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convalidacion_estudiante_externo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_externo_id');
            $table->unsignedBigInteger('convalidacion_id');
            $table->timestamps();

            $table->foreign('estudiante_externo_id')->references('id')->on('estudiantes_externo');
            $table->foreign('convalidacion_id')->references('id')->on('convalidaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convalidacion_estudiante_externo');
    }
}
