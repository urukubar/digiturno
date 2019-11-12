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
    public function crear(Request $request)
    {
      if ($request->password1 == $request->password2) {
        $usuario=\DB::table('users')->where('email',$request->email)->first();
        if ($usuario == null) {
          \DB::table('users')->insert([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password' => Hash::make($request['password1']),
            'idtipo_usuario' => 2
          ]);
          return back()->with('msj', 'usuario guardado con exito');
        }else {
          return back()->with('msj2', 'el email ya esta registrado');
        }
      }else {
        return back()->with('msj2', ' Las contraseñas no coinciden ');
      }
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
      \DB::table('asignacion')->where('iduser',$id)->update(['iduser'=>null]);
      $user=Auth()->user()::destroy($id);
      return redirect('usuarios');
    }

    public function update(Request $request,$id)
    {
      $datos=request()->except(['_token','_method','num_taquilla']);
      \DB::table('users')->where('id',$id)->update($datos);
      $usuarios=\DB::table('users')
      ->get();
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
        return redirect('password')->with('msj', 'Se actualizo la contraseña conrrectamente');
      }else {
        return back()->with('errormjs', 'La contraseña es incorrecta');
      }
    }
}
