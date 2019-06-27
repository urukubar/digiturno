<?php

namespace App\Http\Controllers;

use app\cliente;
use Illuminate\Http\Request;

class MostrarturnoController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index()
    {
      $usuario=Auth()->user();
      $conteo= \DB::table('clientes')
      ->join('tramites','tramites.idtramite','=','clientes.idtramite')
      ->join('users','users.idtramite','=','clientes.idtramite')
      ->where('users.id',$usuario->id)
      ->where('clientes.estado',1)
      ->select (\DB::raw('count(*) as conteo'))
      ->first();
      $servicios= \DB::table('tramites')
      ->select ('tramites.nombre')
      ->join('users','users.idtramite','=','tramites.idtramite')
      ->where('users.id',$usuario->id)
      ->get();
        return view('turnos/inicioturnos',compact('conteo','servicios'));
        // dd($conteo);
    }
    public function siguienteturno()
    {
      $usuario=Auth()->user();
      $conteo= \DB::table('clientes')
      ->join('tramites','tramites.idtramite','=','clientes.idtramite')
      ->join('users','users.idtramite','=','clientes.idtramite')
      ->where('users.id',$usuario->id)
      ->where('clientes.estado',1)
      ->select (\DB::raw('count(*) as conteo'))
      ->first();
      $servicios= \DB::table('tramites')
      ->select ('tramites.nombre')
      ->join('users','users.idtramite','=','tramites.idtramite')
      ->where('users.id',$usuario->id)
      ->get();


      $minimos=\DB::table('clientes')
      ->select (\DB::raw('min(created_at) as minimo'))
      ->where('clientes.idtramite',$usuario->idtramite)
      ->where('clientes.estado',1)
      ->distinct()
      ->first();
      $turnos=\DB::table('clientes')
      ->select('idcliente','turno','identificacion','estado','estado_turno.nombre')
      ->join('estado_turno','clientes.estado','=','estado_turno.idestado')
      ->where('clientes.created_at',$minimos->minimo)
      ->where('clientes.idtramite',$usuario->idtramite)
      ->first();

      $cliente=$turnos->idcliente;
      $this->cambioestado($cliente);

      // \DB::table('clientes')
      // ->where('clientes.created_at',$minimos->minimo)
      // ->where('clientes.estado',1)
      // ->update(['estado'=>2]);


      return view('turnos/turnos',compact('conteo','servicios','turnos'));
      // dd($estado);
    }

    protected function cambioestado($cliente)
    {
      $turnos=\DB::table('clientes')
      ->select ('idcliente','estado','turno','estado_turno.nombre')
      ->join('estado_turno','clientes.estado','=','estado_turno.idestado')
      ->where('clientes.idcliente',$cliente)
      ->first();
      // dd($estado);
      $usuario=Auth()->user();
      $estado2=$turnos->estado;
      $conteo= \DB::table('clientes')
      ->join('tramites','tramites.idtramite','=','clientes.idtramite')
      ->join('users','users.idtramite','=','clientes.idtramite')
      ->where('users.id',$usuario->id)
      ->where('clientes.estado',1)
      ->select (\DB::raw('count(*) as conteo'))
      ->first();
      $servicios= \DB::table('tramites')
      ->select ('tramites.nombre')
      ->join('users','users.idtramite','=','tramites.idtramite')
      ->where('users.id',$usuario->id)
      ->get();

      if ($estado2 == 1) {
        \DB::table('clientes')
        ->where('clientes.idcliente',$cliente)
        ->update(['estado'=>2]);
      }
      if ($estado2 == 2) {
        \DB::table('clientes')
        ->where('clientes.idcliente',$cliente)
        ->update(['estado'=>3]);
        return view('turnos/turnos',compact('conteo','servicios','turnos'));
      }



    }

}
