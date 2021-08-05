<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsabilidadSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsabilidad_social', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('lugar');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedBigInteger('ciclo_id');
            $table->unsignedBigInteger('escuela_id');
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->unsignedBigInteger('docente_responsable_id')->nullable();
            $table->unsignedBigInteger('estudiante_responsable_id')->nullable();
            $table->timestamps();

            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->foreign('escuela_id')->references('id')->on('escuelas');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('docente_responsable_id')->references('id')->on('docentes');
            $table->foreign('estudiante_responsable_id')->references('id')->on('estudiantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsabilidad_social');
    }
}
