<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuradoSutentacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurado_sustentacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurado_id');
            $table->unsignedBigInteger('sustentacion_id');
            $table->unsignedBigInteger('cargo_jurado_id');
            $table->foreign('jurado_id')->references('id')->on('jurados');
            $table->foreign('sustentacion_id')->references('id')->on('sustentaciones');
            $table->foreign('cargo_jurado_id')->references('id')->on('cargo_jurados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurado_sutentacion');
    }
}
