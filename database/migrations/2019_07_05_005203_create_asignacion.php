<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion', function (Blueprint $table) {
            $table->Increments('idasignacion');
            $table->Integer('num_taquilla')->unsigned();
            $table->Integer('id_tipo_tramite')->unsigned();
            $table->timestamps();

            $table->foreign('num_taquilla') -> references ('num_taquilla') -> on ('taquilla');
            $table->foreign('id_tipo_tramite') -> references ('id_tipo_tramite') -> on ('tipo_tramites');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacion');
    }
}
