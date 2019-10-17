<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $tramites=\DB::table('tipo_tramites')
    ->get();

    return view('turnos.turnoadmin',compact('tramites'));
  }

  public function listarturnos($id)
  {
    $turnos=\DB::table('turno_usuarios')
    ->where('turno_usuarios.id_tipotramite',$id)
    ->get();
    return view('turnos.listaturnos',compact('turnos'));

  }
}
