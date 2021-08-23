<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBachilleresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bachilleres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ciclo_id')->nullable();
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bachilleres');
    }
}