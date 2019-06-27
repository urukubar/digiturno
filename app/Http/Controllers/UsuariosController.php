<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


    public function index()
    {
      $usuarios=\DB::table('users')->get();
      return view('usuarios.usuarios', compact('usuarios'));
    }


    public function edit($id)
    {
      $usuarios=\DB::table('users')
      ->where('users.id',$id)
      ->get();
      $tramites=\DB::table('tramites')->get();
      return view('usuarios.edit',compact('usuarios','tramites'));
    }

    public function destroy($id)
    {
      $user=Auth()->user()::destroy($id);
      return redirect('usuarios');
    }

    public function update(Request $request,$id)
    {
      $datos=request()->except(['_token','_method']);
      \DB::table('users')->where('id',$id)->update($datos);
      $usuarios=\DB::table('users')
      ->get();
      $tramites=\DB::table('tramites')->get();
      return view('usuarios.usuarios',compact('usuarios','tramites'));
    }
    public function show()
    {
      $usuarios=\DB::table('users')->get();
      return view('usuarios.usuarios', compact('usuarios'));
    }

}
