<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnoUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turno_usuarios', function (Blueprint $table) {
            // $table->engine = "InnoDB";
            $table->Increments('id');
            $table->timestamps();

            $table->integer('cedulaUsuario');
            $table->integer('id_tipotramite')->unsigned();
            $table->integer('Num_Turno');
            $table->integer('id_estado_turno')->unsigned();

            //Foreign key
            $table->foreign('id_tipotramite') -> references ('id_tipo_tramite') -> on ('tipo_tramites');
            $table->foreign('id_estado_turno') -> references ('idestado_turno') -> on ('estado_turno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turno_usuarios');
    }
}
