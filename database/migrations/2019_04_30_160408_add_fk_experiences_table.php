<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiences', function (Blueprint $table) {

            $table->foreign('pregon_id', 'experiences_fk_pregones')->references('id')->on('pregones');
            $table->foreign('user_id', 'experiences_fk_users')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiences', function (Blueprint $table) {

            $table->dropForeign('experiences_fk_pregones');
            $table->dropForeign('experiences_fk_users');

        });
    }
}
