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
Route::post('/cambiotaquilla/{id}','HomeController@newtaquilla')->name('cambiotaquilla');

//ruta de registro nuevo usuario
Route::get('/register', function() {
      $tramites=\DB::table('taquilla')->get();

      return view('/auth/register',compact('tramites'));
})->name('register');

//rutas de los usuarios
Route::resource('usuarios','UsuariosController');
//rutas de las taquillas
Route::resource('taquillas','TaquillaController');
Route::get('/createtaquilla',function(){
        $usuarios=\DB::table('users')->get();
        $tramites=\DB::table('tipo_tramites')->get();
    return view('taquillas.create',compact('usuarios','tramites'));
})->name('createtaquilla');
//ruta de los turnos
Route::get('/turnos','MostrarturnoController@index')->name('turnos');
Route::get('/turnos/llamando','MostrarturnoController@siguienteturno')->name('llamado');
Route::get('/turnos/{id}/{idt}','MostrarturnoController@cambioestado')->name('turnos2');
Route::get('/posponer/{id}/{idt}','MostrarturnoController@posponer')->name('turnos3');
Route::get('/transferir/{id}','MostrarturnoController@transferir')->name('trasnferir');
Route::post('/cambiotramite/{id}','MostrarturnoController@cambiotramite')->name('cambiotramite');
Route::get('/evaluacion/{id}','MostrarturnoController@evaluacion')->name('evaluacion');
Route::post('/envioevaluacion/{id}','MostrarturnoController@agregarevaluacion')->name('envio');

Route::resource('tramites','TramiteController');
Route::get('/createtramite',function(){
    return view('/tramites/create');
})->name('createtramite');

Route::get('/password',function(){
  $usuario=$usuario=Auth()->user();
  return view('usuarios.password',compact('usuario'));
})->name('password');
