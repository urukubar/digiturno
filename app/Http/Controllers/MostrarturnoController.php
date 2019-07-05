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
    //buscamos el tramite que pretenece al usuario iniciado
      $usuario=Auth()->user();
      $tramites=\DB::table('asignacion')
      ->select('asignacion.id_tipo_tramite','tipo_tramites.Descripcion','taquilla.num_taquilla')
      ->join('taquilla','taquilla.num_taquilla','=','asignacion.num_taquilla')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','asignacion.id_tipo_tramite')
      ->join('users','users.id','=','taquilla.idusuario')
      ->where('users.id',$usuario->id)
      ->first();
      //hacemos un conteo de los turnos en espera
      $conteo=\DB::table('turno_usuarios')
      ->where('turno_usuarios.id_tipotramite',$tramites->id_tipo_tramite)
      ->where('turno_usuarios.id_estado_turno',1)
      ->select (\DB::raw('count(*) as conteo'))
      ->first();
      // dd($tramites);

        return view('turnos/inicioturnos',compact('tramites','conteo'));

    }
    public function siguienteturno()
    {
      $usuario=Auth()->user();
      $tramites=\DB::table('asignacion')
      ->select('asignacion.id_tipo_tramite','tipo_tramites.Descripcion','taquilla.num_taquilla')
      ->join('taquilla','taquilla.num_taquilla','=','asignacion.num_taquilla')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','asignacion.id_tipo_tramite')
      ->join('users','users.id','=','taquilla.idusuario')
      ->where('users.id',$usuario->id)
      ->first();
      $conteo=\DB::table('turno_usuarios')
      ->where('turno_usuarios.id_tipotramite',$tramites->id_tipo_tramite)
      ->where('turno_usuarios.id_estado_turno',1)
      ->select (\DB::raw('count(*) as conteo'))
      ->first();
      //buscamos el turno mas pronto a atender
      $minimos=\DB::table('turno_usuarios')
      ->select (\DB::raw('min(created_at) as minimo'))
      ->where('turno_usuarios.id_tipotramite',$tramites->id_tipo_tramite)
      ->where('turno_usuarios.id_estado_turno',1)
      ->distinct()
      ->first();
//tomamos los datos del turno
      $turnos=\DB::table('turno_usuarios')
      ->select('turno_usuarios.id','turno_usuarios.Num_Turno','estado_turno.nombre_estado')
      ->join('estado_turno','estado_turno.idestado_turno','=','turno_usuarios.id_estado_turno')
      ->where('turno_usuarios.created_at',$minimos->minimo)
      ->where('turno_usuarios.id_tipotramite',$tramites->id_tipo_tramite)
      ->first();

      $cliente=$turnos->id;

      $this->cambioestado($cliente);

      // \DB::table('clientes')
      // ->where('clientes.created_at',$minimos->minimo)
      // ->where('clientes.estado',1)
      // ->update(['estado'=>2]);


      return view('turnos/turnos',compact('tramites','conteo','turnos'));
      // dd($estado);
    }

    protected function cambioestado($cliente)
    {
      $turnos=\DB::table('turno_usuarios')
      ->select ('turno_usuarios.id','turno_usuarios.id_estado_turno','turno_usuarios.Num_Turno','estado_turno.nombre_estado','tipo_tramites.Letra')
      ->join('estado_turno','estado_turno.idestado_turno','=','turno_usuarios.id_estado_turno')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','turno_usuarios.id_tipotramite')
      ->where('turno_usuarios.id',$cliente)
      ->first();
      // dd($turnos);
      $usuario=Auth()->user();
      $estado2=$turnos->id_estado_turno;
      $tramites=\DB::table('asignacion')
      ->select('asignacion.id_tipo_tramite','tipo_tramites.Descripcion','taquilla.num_taquilla')
      ->join('taquilla','taquilla.num_taquilla','=','asignacion.num_taquilla')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','asignacion.id_tipo_tramite')
      ->join('users','users.id','=','taquilla.idusuario')
      ->where('users.id',$usuario->id)
      ->first();
      $conteo=\DB::table('turno_usuarios')
      ->where('turno_usuarios.id_tipotramite',$tramites->id_tipo_tramite)
      ->where('turno_usuarios.id_estado_turno',1)
      ->select (\DB::raw('count(*) as conteo'))
      ->first();
      //buscamos el turno mas pronto a atender
      $minimos=\DB::table('turno_usuarios')
      ->select (\DB::raw('min(created_at) as minimo'))
      ->where('turno_usuarios.id_tipotramite',$tramites->id_tipo_tramite)
      ->where('turno_usuarios.id_estado_turno',1)
      ->distinct()
      ->first();


      // $conteo= \DB::table('clientes')
      // ->join('tramites','tramites.idtramite','=','clientes.idtramite')
      // ->join('users','users.idtramite','=','clientes.idtramite')
      // ->where('users.id',$usuario->id)
      // ->where('clientes.estado',1)
      // ->select (\DB::raw('count(*) as conteo'))
      // ->first();
      // $servicios= \DB::table('tramites')
      // ->select ('tramites.nombre')
      // ->join('users','users.idtramite','=','tramites.idtramite')
      // ->where('users.id',$usuario->id)
      // ->get();

      if ($estado2 == 1) {
        \DB::table('turno_usuarios')
        ->where('turno_usuarios.id',$cliente)
        ->update(['id_estado_turno'=>2]);
      }
      if ($estado2 == 2) {
        \DB::table('turno_usuarios')
        ->where('turno_usuarios.id',$cliente)
        ->update(['id_estado_turno'=>3]);
        return view('turnos/turnos',compact('conteo','tramites','turnos'));
      }



    }

}
