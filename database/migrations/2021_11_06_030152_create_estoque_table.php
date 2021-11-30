<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoqueTable extends Migration
{
    
    public function up()
    {
        Schema::create('estoque', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->integer('quantidade');
            $table->unsignedBigInteger('alimento_id');
            $table->timestamps();
            $table->foreign('alimento_id')->references('id')->on('alimentos');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('estoque');
    }
}
