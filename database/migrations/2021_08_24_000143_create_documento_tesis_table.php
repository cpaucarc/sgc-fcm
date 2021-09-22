<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_tesis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tesis_id');
            $table->unsignedBigInteger('documento_id');
            $table->foreign('tesis_id')->references('id')->on('tesis');
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
        Schema::dropIfExists('documento_tesis');
    }
}
