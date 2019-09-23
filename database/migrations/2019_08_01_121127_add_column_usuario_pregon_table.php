<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsuarioPregonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario_pregon', function (Blueprint $table) {
            $table->integer("pregonType")->after("rebound")->default(1); #1) online 2) presencial
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario_pregon', function (Blueprint $table) {
            $table->dropColumn("pregonType");
        });
    }
}
