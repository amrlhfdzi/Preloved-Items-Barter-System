<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barters', function (Blueprint $table) {

            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
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

            $table->dropColumn('status');
            //
        });
    }
}
