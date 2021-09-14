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
            $table->decimal('minimo', 4, 1);
            $table->decimal('satisfactorio', 4, 1);
            $table->decimal('sobresaliente', 4, 1);
            $table->smallInteger('interes')->nullable();
            $table->smallInteger('total')->nullable();
            $table->smallInteger('resultado');
            $table->text('interpretacion')->nullable();
            $table->text('observacion')->nullable();
            $table->string('elaborado_por')->nullable();
            $table->string('revisado_por')->nullable();
            $table->string('aprobado_por')->nullable();
            $table->unsignedBigInteger('indicador_id');
            $table->date('fecha_medicion_inicio')->nullable();
            $table->date('fecha_medicion_fin')->nullable();
            $table->timestamps();

            $table->foreign('indicador_id')->references('id')->on('indicadores');
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
