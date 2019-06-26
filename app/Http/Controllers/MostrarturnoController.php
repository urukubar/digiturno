<?php

namespace App\Http\Controllers;

use app\cliente;
use Illuminate\Http\Request;

class MostrarturnoController extends Controller
{



    public function index()
    {
      $usuario=Auth()->user();
      $minimo=\DB::table('clientes')
      ->select (\DB::raw('min(created_at) as minimo'))
      ->where('clientes.idtramite',$usuario->idtramite)
      ->get();
      // $turno=\DB::table('clientes')
      // ->select('turno','identificacion')
      // ->where('clientes.created_at',$minimo)
      // ->get();

      return view('home',compact('minimo'));
    }

}
