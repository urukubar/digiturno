<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_tramites', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id_tipo_tramite');

            $table->String('Descripcion');
            $table->String('Letra');
            $table->integer('Num_turno');
            // $table->Increments('Num_Turno');
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
        Schema::dropIfExists('tipo_tramites');
    }
}
