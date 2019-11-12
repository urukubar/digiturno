<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $usuario=Auth()->user();
      if ($usuario->id==1) {
        return redirect('/usuarios');
      }else {
        return view('home',compact('usuario'));
      }

    }

    public function newtaquilla(Request $request,$id)
    {

      $datos=request()->except(['_token','_method']);
      $taquilla=\DB::table('asignacion')->where('idtaquilla',$request->taquilla)->first();
      if ($taquilla==null) {
        \DB::table('asignacion')->where('iduser',$id)->update(['iduser'=>null]);
          \DB::table('asignacion')->insert([
            'idtaquilla'=>$request['taquilla'],
            'iduser'=>$id
          ]);
          // \DB::table('asignacion')->where('iduser',$id)->update(['iduser'=>null]);
      }else {
        \DB::table('asignacion')->where('iduser',$id)->update(['iduser'=>null]);
        \DB::table('asignacion')->where('idtaquilla',$request->taquilla)->update(['iduser'=>$id]);
      }
      \DB::table('users')->where('id', $id )->update(['conectado'=>1]);
      return redirect('/turnos');
      // dd($request);

    }

}
