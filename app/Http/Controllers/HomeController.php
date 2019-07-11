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
      return view('home',compact('usuario'));
    }

    public function newtaquilla(Request $request,$id)
    {
      $datos=request()->except(['_token','_method']);
      \DB::table('taquilla')->where('idusuario',$id)->update(['idusuario'=>null]);
      \DB::table('taquilla')->where('num_taquilla',$request->taquilla)->update(['idusuario'=>$id]);
      return redirect('/turnos');
    }

}
