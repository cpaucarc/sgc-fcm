<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesores', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('cip');
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->foreign('docente_id')->references('id')->on('docentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asesores');
    }
}
