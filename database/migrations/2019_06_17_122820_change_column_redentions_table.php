<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnRedentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('redentions', function (Blueprint $table) {

            $table->dropForeign('redentions_fk_usuario_pregon');

            $table->dropColumn('usuario_pregon_id');

            $table->unsignedInteger('usuario_redime');

            //$table->renameColumn('usuario_pregon_id', 'usuario_redime');

            $table->foreign('usuario_redime', 'redentions_fk_usuario_redime')->references('id')->on('users');

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

            $table->dropForeign('redentions_fk_usuario_redime');

            $table->dropColumn('usuario_redime');

            $table->unsignedInteger('usuario_pregon_id');

//            $table->renameColumn('usuario_redime', 'usuario_pregon_id');

            $table->foreign('usuario_pregon_id', 'redentions_fk_usuario_pregon')->references('id')->on('usuario_pregon');

        });
    }
}
