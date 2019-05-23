<?php

namespace App\Http\Controllers;

use app\cliente;
use Illuminate\Http\Request;

class MostrarturnoController extends Controller
{



    public function index($id)
    {

      $llamados=\DB::table('cliente')
      ->where('cliente.idcliente',$id)
      ->get();
      return view('turnos',compact('llamados'));
    }

}
