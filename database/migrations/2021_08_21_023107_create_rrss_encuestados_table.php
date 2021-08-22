<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRRSSEncuestadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrss_encuestados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_encuestado')->nullable();
            $table->string('correo_encuestado')->nullable();
            $table->unsignedBigInteger('rrss_encuesta_id');
            $table->timestamps();

            $table->foreign('rrss_encuesta_id')->references('id')->on('rrss_encuestas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrss_encuestados');
    }
}
