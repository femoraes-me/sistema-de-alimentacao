<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEscolasIdToCardapiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cardapios', function (Blueprint $table) {
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
        Schema::table('cardapios', function (Blueprint $table) {
            $table->dropColumn('escolas_id');
        });
    }
}
