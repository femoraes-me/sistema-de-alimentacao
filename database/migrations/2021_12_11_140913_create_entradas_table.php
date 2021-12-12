<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('escolas_id');
            $table->unsignedBigInteger('alimentos_id');
            $table->decimal('quantidade_entrada', $precision = 7, $scale = 3);
            $table->date('data');
            $table->timestamps();

            $table->foreign('escolas_id')->references('id')->on('escolas');
            $table->foreign('alimentos_id')->references('id')->on('alimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
