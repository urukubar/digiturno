<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visita', function (Blueprint $table) {
            $table->Increments('idvisita');
            $table->Integer('documento');
            $table->Integer('id_tipo_tramite');
            $table->Integer('num_turno');
            $table->DateTime('fecha_creacion');
            $table->Integer('num_taquilla')->unsigned();
            $table->DateTime('incio_atencion');
            $table->DateTime('fin_atencion');
            $table->Integer('abandono');
            $table->Integer('evaluacion');

            $table->foreign('num_taquilla') -> references ('num_taquilla') -> on ('taquilla');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visita');
    }
}
