<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_responsables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('responsable_id');
            $table->unsignedBigInteger('actividad_id');

            $table->foreign('responsable_id')->references('id')->on('responsables');
            $table->foreign('actividad_id')->references('id')->on('actividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_responsables');
    }
}
