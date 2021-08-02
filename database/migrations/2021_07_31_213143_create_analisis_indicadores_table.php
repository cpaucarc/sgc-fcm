<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisisIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis_indicadores', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('minimo');
            $table->smallInteger('satisfactorio');
            $table->smallInteger('sobresaliente');
            $table->smallInteger('interes')->nullable();
            $table->smallInteger('total')->nullable();
            $table->smallInteger('resultado');
            $table->date('periodo');
            $table->text('interpretacion')->nullable();
            $table->text('observacion')->nullable();
            $table->string('elaborado_por')->nullable();
            $table->string('revisado_por')->nullable();
            $table->string('aprobado_por')->nullable();
            $table->unsignedBigInteger('indicador_id')->nullable();
            $table->unsignedBigInteger('escuela_id')->nullable()->nullable();
            $table->unsignedBigInteger('facultad_id')->nullable();
            $table->timestamps();

            $table->foreign('indicador_id')->references('id')->on('indicadores');
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
        Schema::dropIfExists('analisis_indicadores');
    }
}
