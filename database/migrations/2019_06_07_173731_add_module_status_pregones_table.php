<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddModuleStatusPregonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pregones', function (Blueprint $table) {

            $table->boolean('moduleStatus')->default(1)->after('evidencia_camps');
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

            $table->dropColumn('moduleStatus');
        });
    }
}
