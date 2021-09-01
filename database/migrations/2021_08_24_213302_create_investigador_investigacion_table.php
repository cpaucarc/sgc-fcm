<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigadorInvestigacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigador_investigacion', function (Blueprint $table) {
            $table->id();
            $table->boolean('es_responsable')->default(false);
            $table->unsignedBigInteger('investigacion_id');
            $table->unsignedBigInteger('investigador_id');
            $table->timestamps();

            $table->foreign('investigacion_id')->references('id')->on('investigaciones');
            $table->foreign('investigador_id')->references('id')->on('investigadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investigador_investigacion');
    }
}
