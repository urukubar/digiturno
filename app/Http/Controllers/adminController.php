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
    ->select(\DB::raw('count(*) as conteo'),'tipo_tramites.Descripcion','tipo_tramites.Letra','tipo_tramites.id_tipo_tramite')
    ->join('turno_usuarios','turno_usuarios.id_tipotramite','=','tipo_tramites.id_tipo_tramite')
    ->groupBy('tipo_tramites.Descripcion','tipo_tramites.Letra','tipo_tramites.id_tipo_tramite')
    ->get();
    // dd($tramites);
    return view('turnos.turnoadmin',compact('tramites'));
  }

  public function listarturnos($id)
  {
    $turnos=\DB::table('turno_usuarios')
    ->where('turno_usuarios.id_tipotramite',$id)
    ->orderBy('turno_usuarios.prioridad','DESC')
    ->orderBy('turno_usuarios.created_at')
    ->get();
    return view('turnos.listaturnos',compact('turnos'));

  }
}
