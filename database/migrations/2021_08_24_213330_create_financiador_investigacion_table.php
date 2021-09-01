<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanciadorInvestigacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financiador_investigacion', function (Blueprint $table) {
            $table->id();
            $table->decimal('presupuesto', 10, 2);
            $table->unsignedBigInteger('investigacion_id');
            $table->unsignedBigInteger('financiador_id');

            $table->foreign('investigacion_id')->references('id')->on('investigaciones');
            $table->foreign('financiador_id')->references('id')->on('financiadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financiador_investigacion');
    }
}
