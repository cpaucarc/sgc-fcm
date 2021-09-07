<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 12)->unique();
            $table->unsignedBigInteger('estado_id')->default(1);
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('escuela_id');

            $table->foreign('estado_id')->references('id')->on('estado_estudiante');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('escuela_id')->references('id')->on('escuelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
