<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkRedentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('redentions', function (Blueprint $table) {

            $table->foreign('usuario_pregon_id', 'redentions_fk_usuario_pregon')->references('id')->on('usuario_pregon');
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

            $table->dropForeign('redentions_fk_usuario_pregon');
        });
    }
}
