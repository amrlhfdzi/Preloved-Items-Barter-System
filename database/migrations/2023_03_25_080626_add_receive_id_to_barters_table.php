<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReceiveIdToBartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barters', function (Blueprint $table) {
            $table->unsignedBigInteger('receive_id');
            $table->foreign('receive_id')->references('id')->on('users');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barters', function (Blueprint $table) {
            $table->dropColumn('receive_id');
            //
        });
    }
}
