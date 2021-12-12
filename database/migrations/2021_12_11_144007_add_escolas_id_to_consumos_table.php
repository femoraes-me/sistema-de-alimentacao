<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEscolasIdToConsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consumos', function (Blueprint $table) {
            $table->unsignedBigInteger('escolas_id')->after('id');

            $table->foreign('escolas_id')->references('id')->on("escolas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consumos', function (Blueprint $table) {
            $table->dropColumn('escolas_id');
        });
    }
}
