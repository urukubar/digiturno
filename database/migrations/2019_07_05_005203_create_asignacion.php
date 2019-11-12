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
          $table->engine = 'InnoDB';
            $table->Increments('idasignacion');
            $table->Integer('idtaquilla')->unsigned();
            $table->Integer('iduser')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('idtaquilla') -> references ('num_taquilla') -> on ('taquilla');
            $table->foreign('iduser') -> references ('id') -> on ('users');

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
