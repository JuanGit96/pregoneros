<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToRedentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('redentions', function (Blueprint $table) {
            $table->foreign('checklist_id', 'redentions_fk_usuarioPregon')->references('id')->on('usuario_pregon');
            $table->foreign('pregonero_id', 'redentions_fk_user')->references('id')->on('users');
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
            $table->dropForeign('redentions_fk_usuarioPregon');
            $table->dropForeign('redentions_fk_user');
        });
    }
}
