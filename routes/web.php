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

      $tramites=\DB::table('tramites')->get();
      return view('/auth/register',compact('tramites'));
})->name('register');

// Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
Route::resource('usuarios','UsuariosController');
Route::get('/turnos','HomeController@siguienteturno')->name('turnos');
Route::get('/turnos/{id}','HomeController@cambioestado')->name('turnos2');
Route::resource('tramites','TramiteController');
Route::get('/createtramite',function(){
    return view('/tramites/create');
})->name('createtramite');

Route::get('/usuarios/password',function(){
  return view('/usuarios/password');
})->name('password');
