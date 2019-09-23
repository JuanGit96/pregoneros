<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkPregonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pregones', function (Blueprint $table) {

            $table->foreign('campaign_id', 'pregones_fk_campaigns')->references('id')->on('campaigns');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pregones', function (Blueprint $table) {

            $table->dropForeign('pregones_fk_campaigns');

        });
    }
}
