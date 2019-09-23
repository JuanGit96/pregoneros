<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePregonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identificador_pregon');
//            $table->string('codigo_redime');
            $table->string('beneficio_redime')->nullable();
            $table->longText('objetivo');
            $table->string('pago');
            $table->date('fecha_limite');
            $table->longText('pregon');
            $table->longText('experiencia');
            $table->longText('evidencia');
            $table->string('evidencia_camps');
            $table->unsignedInteger('campaign_id');
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
        Schema::dropIfExists('pregones');
    }
}
