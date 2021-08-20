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
        Schema::create('jurado_sutentacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurado_id')->nullable();
            $table->unsignedBigInteger('tesis_id')->nullable();
            $table->foreign('jurado_id')->references('id')->on('jurados');
            $table->foreign('tesis_id')->references('id')->on('tesis');
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
