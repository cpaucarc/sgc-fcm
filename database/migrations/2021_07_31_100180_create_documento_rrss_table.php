<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoRRSSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_rrss', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('responsabilidad_social_id');
            $table->unsignedBigInteger('documento_id');

            $table->foreign('responsabilidad_social_id')->references('id')->on('responsabilidad_social');
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
        Schema::dropIfExists('documento_rrss');
    }
}
