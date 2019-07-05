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
      // $usuarios=\DB::table('users')->get();
      $usuarios=\DB::table('asignacion')
      ->select('taquilla.num_taquilla','users.id','users.name','users.email','tipo_tramites.Descripcion')
      ->join('taquilla','taquilla.num_taquilla','=','asignacion.num_taquilla')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','asignacion.id_tipo_tramite')
      ->join('users','users.id','=','taquilla.idusuario')
      ->get();
      $usuarios2=\DB::table('users')->get();


      // foreach ($usuarios2 as $usuario2) {
      //     foreach ($usuarios as $usuario) {
      //       if ($usuario2->id == $usuarios->id) {
      //         $cont=$usuario2;
      //       }
      //       else {
      //         $sint=$usuaro2;
      //       }
      //     }
      // }
      // dd($usuarios);
      return view('usuarios.usuarios', compact('usuarios'));
    }


    public function edit($id)
    {
      $usuarios=\DB::table('users')
      ->where('users.id',$id)
      ->get();
      $tramites=\DB::table('taquilla')->get();
      return view('usuarios.edit',compact('usuarios','tramites'));
      // dd($usuarios);
    }

    public function destroy($id)
    {
      \DB::table('taquilla')->where('idusuario',$id)->update(['idusuario'=>null]);
      $user=Auth()->user()::destroy($id);
      return redirect('usuarios');
    }

    public function update(Request $request,$id)
    {
      $datos=request()->except(['_token','_method','num_taquilla']);
      \DB::table('users')->where('id',$id)->update($datos);
      $usuarios=\DB::table('users')
      ->get();
      // dd($request->num_taquilla);
      if ($request->num_taquilla == null) {
        \DB::table('taquilla')->where('num_taquilla',$request->num_taquilla)->update(['idusuario'=>null]);
      }
      else {
          \DB::table('taquilla')->where('num_taquilla',$request->num_taquilla)->update(['idusuario'=>$id]);
      }


      // $tramites=\DB::table('tramites')->get();
      // return view('usuarios.usuarios',compact('usuarios','tramites'));
      return redirect('usuarios');
    }
    public function show()
    {
      $usuarios=\DB::table('users')->get();
      return view('usuarios.usuarios', compact('usuarios'));
    }

}
