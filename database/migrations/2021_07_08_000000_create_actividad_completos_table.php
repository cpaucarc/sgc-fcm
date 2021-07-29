<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadCompletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_completos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_operacion')->useCurrent();
            $table->unsignedBigInteger('actividad_id');
            $table->unsignedBigInteger('ciclo_id');

            $table->foreign('actividad_id')->references('id')->on('actividades');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_completos');
    }
}
