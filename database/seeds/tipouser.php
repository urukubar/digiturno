<?php

use Illuminate\Database\Seeder;

class tipouser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_usuario')->insert([
          'nombre'=>'admin'
        ]);
        \DB::table('tipo_usuario')->insert([
          'nombre'=>'user'
        ]);
    }
}
