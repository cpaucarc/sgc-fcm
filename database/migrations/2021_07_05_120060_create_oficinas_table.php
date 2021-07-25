<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nivel_oficina_id');
            $table->unsignedBigInteger('facultad_id')->nullable();
            $table->unsignedBigInteger('escuela_id')->nullable();

            $table->foreign('nivel_oficina_id')->references('id')->on('nivel_oficinas');
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
        Schema::dropIfExists('oficinas');
    }
}
