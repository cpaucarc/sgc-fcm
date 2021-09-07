<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigadores', function (Blueprint $table) {
            $table->id();
            $table->string('correo')->nullable();
            $table->string('sitio_web')->nullable();
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('grado_academico_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->unsignedBigInteger('docente_id')->nullable();

            $table->foreign('grado_academico_id')->references('id')->on('grado_academico');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('docente_id')->references('id')->on('docentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investigadores');
    }
}
