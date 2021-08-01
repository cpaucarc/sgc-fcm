<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipanteRRSSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante_rrss', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_incorporacion');
            $table->unsignedBigInteger('responsabilidad_social_id');
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->unsignedBigInteger('docente_id')->nullable();

            $table->foreign('responsabilidad_social_id')->references('id')->on('responsabilidad_social');
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
        Schema::dropIfExists('participante_rrss');
    }
}
