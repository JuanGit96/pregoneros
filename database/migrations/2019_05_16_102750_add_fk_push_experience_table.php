<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkPushExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('push_experience', function (Blueprint $table) {

            $table->foreign('experience_id', 'push_experience_fk_experiences')->references('id')->on('experiences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('push_experience', function (Blueprint $table) {

            $table->dropForeign('push_experience_fk_experiences');
        });
    }
}
