<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
          'name'=> 'administrador',
          'email'=> 'admin@gmail.com',
          'password' => Hash::make('12345678'),
          'idtipo_usuario'=> '1'
        ]);
    }
}
