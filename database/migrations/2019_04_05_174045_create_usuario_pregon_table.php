<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioPregonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_pregon', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pregon_id');
            $table->unsignedInteger('user_id');

            $table->string('nombre');
            $table->string('codigo_redime');
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->integer('edad');
            $table->boolean('sexo');
            $table->string('donde_lo_conoces');
            $table->boolean('interesado');
            $table->string('why');
            $table->string('comentarios')->nullable();
            $table->string('ubicacion');
            $table->string('latitud');
            $table->string('longitud');

            $table->string('photo')->nullable();
            $table->string('video')->nullable();
            $table->string('audio1')->nullable();
            $table->string('audio2')->nullable();

            $table->boolean('approved')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_pregon');
    }
}
