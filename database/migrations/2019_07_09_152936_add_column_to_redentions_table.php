<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToRedentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('redentions', function (Blueprint $table) {
            $table->unsignedInteger("checklist_id")->after("code")->nullable();
            $table->unsignedInteger("pregonero_id")->after("code")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('redentions', function (Blueprint $table) {
            $table->dropColumn("checklist_id");
            $table->dropColumn("pregonero_id");
        });
    }
}
