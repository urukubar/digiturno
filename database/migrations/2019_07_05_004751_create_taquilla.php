<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaquilla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taquilla', function (Blueprint $table) {
            $table->Increments('num_taquilla');
            $table->integer('idusuario')->unsigned();
            $table->timestamps();

            $table->foreign('idusuario') -> references ('id') -> on ('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taquilla');
    }
}
