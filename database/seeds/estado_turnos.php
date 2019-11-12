<?php

use Illuminate\Database\Seeder;

class estado_turnos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('estado_turno')->insert([
        'nombre_estado'=>'Espera'
      ]);
      \DB::table('estado_turno')->insert([
        'nombre_estado'=>'Llamando'
      ]);
      \DB::table('estado_turno')->insert([
        'nombre_estado'=>'Atendiendo'
      ]);
      \DB::table('estado_turno')->insert([
        'nombre_estado'=>'Evaluado'
      ]);

    }
}
