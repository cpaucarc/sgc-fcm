<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudConvalidacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_convalidacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_externo_id')->nullable();
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->unsignedBigInteger('estado_id')->default('1');
            $table->timestamps();

            $table->foreign('estudiante_externo_id')->references('id')->on('estudiantes_externo');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('estado_id')->references('id')->on('estado_solicitud');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_convalidacion');
    }
}
