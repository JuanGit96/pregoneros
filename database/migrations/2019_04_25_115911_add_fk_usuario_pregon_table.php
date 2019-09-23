<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkUsuarioPregonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario_pregon', function (Blueprint $table) {

            $table->foreign('pregon_id', 'usuario_pregon_fk_pregones')->references('id')->on('pregones');
            $table->foreign('user_id', 'users_fk_pregones')->references('id')->on('users');

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

            $table->dropForeign('usuario_pregon_fk_pregones');
            $table->dropForeign('users_fk_pregones');

        });
    }
}
