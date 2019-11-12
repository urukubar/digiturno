<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTramitesTaquilla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites_taquilla', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('idtramite_taquilla');
            $table->Integer('idtaquilla')->unsigned();
            $table->Integer('idtramite')->unsigned();
            $table->timestamps();

            $table->foreign('idtaquilla') -> references ('num_taquilla') -> on ('taquilla');
            $table->foreign('idtramite') -> references ('id_tipo_tramite') -> on ('tipo_tramites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tramites_taquilla');
    }
}
