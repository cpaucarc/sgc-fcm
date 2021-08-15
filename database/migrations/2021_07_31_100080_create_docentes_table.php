<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique()->nullable();
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('escuela_id')->nullable();
            $table->unsignedBigInteger('facultad_id');

            $table->foreign('persona_id')->references('id')->on('personas');
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
        Schema::dropIfExists('docentes');
    }
}
