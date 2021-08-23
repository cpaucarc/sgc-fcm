<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBachillerTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bachiller_tesis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bachiller_id')->nullable();
            $table->unsignedBigInteger('tesis_id')->nullable();
            $table->foreign('bachiller_id')->references('id')->on('bachilleres');
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
        Schema::dropIfExists('bachiller_tesis');
    }
}
