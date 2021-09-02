<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRRSSEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrss_encuestas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_inicio')->useCurrent();
            $table->dateTime('fecha_fin')->nullable();
            $table->string('link')->nullable();
            $table->unsignedBigInteger('responsabilidad_social_id');

            $table->foreign('responsabilidad_social_id')->references('id')->on('responsabilidad_social');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrss_encuestas');
    }
}
