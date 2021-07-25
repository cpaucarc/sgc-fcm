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
            $table->unsignedBigInteger('actividad_responsable_id');
            $table->unsignedBigInteger('ciclo_id');
            $table->unsignedBigInteger('documento_id')->nullable();

            $table->foreign('actividad_responsable_id')->references('id')->on('actividad_responsables');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->foreign('documento_id')->references('id')->on('documentos');
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
