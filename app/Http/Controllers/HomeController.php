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
      $servicios= \DB::table('clientes')
      ->select('clientes.identificacion','clientes.turno','tramites.nombre','clientes.idtramite')
      ->join('tramites','tramites.idtramite','=','clientes.idtramite')
      ->join('users','users.idtramite','=','clientes.idtramite')
      ->where('users.id',$usuario->id)
      ->get();
        return view('home',compact('servicios'));
    }

}
