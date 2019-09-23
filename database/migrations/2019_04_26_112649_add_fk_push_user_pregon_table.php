<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkPushUserPregonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('push_user_pregon', function (Blueprint $table) {

            $table->foreign('pregon_id', 'push_fk_pregones')->references('id')->on('pregones');
            $table->foreign('user_id', 'push_fk_users')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('push_user_pregon', function (Blueprint $table) {

            $table->dropForeign('push_fk_pregones');
            $table->dropForeign('push_fk_users');

        });
    }
}
