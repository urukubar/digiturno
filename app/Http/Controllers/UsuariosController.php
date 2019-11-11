<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
    public function updatepass(Request $request,$id)
    {

      $pass=Hash::check($request->password, Auth::user()->password);
      if ($pass == true ) {
        \DB::table('users')
        ->where('id',Auth::user()->id)
        ->update(['password'=>Hash::make($request->newpass)]);
        return redirect('turnos')->with('msj', 'Se actualizo la contraseña conrrectamente');
      }else {
        return back()->with('errormjs', 'La contraseña es incorrecta');
      }
    }
}
