<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBarterPeopleIdToBartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barters', function (Blueprint $table) {
            $table->foreignId('barterPeople_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
            $table->dropColumn('barterPeople_id');
            $table->dropColumn('user_id');
            //
        });
    }
}
