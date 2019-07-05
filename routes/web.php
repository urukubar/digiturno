<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/turno', 'MostrarturnoController@index')->name('turno');
Route::get('/register', function() {

      $tramites=\DB::table('taquilla')->where('idusuario',null)->get();
      return view('/auth/register',compact('tramites'));
})->name('register');

// Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
Route::resource('usuarios','UsuariosController');
Route::resource('taquillas','TaquillaController');
Route::get('/createtaquilla',function(){
    return view('taquillas.create');
})->name('createtaquilla');

Route::get('/turnos','MostrarturnoController@index')->name('turnos');
Route::get('/turnos/llamando','MostrarturnoController@siguienteturno')->name('llamado');
Route::get('/turnos/{id}','MostrarturnoController@cambioestado')->name('turnos2');

Route::resource('tramites','TramiteController');
Route::get('/createtramite',function(){
    return view('/tramites/create');
})->name('createtramite');

Route::get('/password',function(){
  $usuario=$usuario=Auth()->user();
  return view('usuarios.password',compact('usuario'));
})->name('password');
