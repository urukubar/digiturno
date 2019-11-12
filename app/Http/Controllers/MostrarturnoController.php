<?php

namespace App\Http\Controllers;

use app\cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
      ->select('tramites_taquilla.idtramite','asignacion.idtaquilla','tipo_tramites.Descripcion')
      ->join('users','users.id','=','asignacion.iduser')
      ->join('taquilla','taquilla.num_taquilla','=','asignacion.idtaquilla')
      ->join('tramites_taquilla','tramites_taquilla.idtaquilla','=','taquilla.num_taquilla')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','tramites_taquilla.idtramite')
      ->where('users.id',$usuario->id)
      ->first();

      $conteo=\DB::table('turno_usuarios')
      ->select(\DB::raw('count(*) as conteo'),'tipo_tramites.Descripcion')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','turno_usuarios.id_tipotramite')
      ->whereIn('turno_usuarios.id_tipotramite', function($query){
          $usuario=Auth()->user();
          $tramites=\DB::table('asignacion')
          ->select('asignacion.idtaquilla')
          ->join('users','users.id','=','asignacion.iduser')
          ->where('users.id',$usuario->id)
          ->first();
          $query->select('tramites_taquilla.idtramite')
          ->from('taquilla')
          ->join('tramites_taquilla','tramites_taquilla.idtaquilla','=','taquilla.num_taquilla')
          ->where('tramites_taquilla.idtaquilla','=',$tramites->idtaquilla);
      })
      ->groupBy('tipo_tramites.Descripcion')
      ->get();
      // dd($usuario->id);
        return view('turnos/inicioturnos',compact('tramites','conteo'));
    }
    protected function mostrardatos($turno)
    {
      $estado=\DB::table('turno_usuarios')
      ->where('turno_usuarios.id',$turno)
      ->update(['id_estado_turno'=>2]);

      $turnos=\DB::table('turno_usuarios')
      ->select('turno_usuarios.id','turno_usuarios.Num_Turno','estado_turno.nombre_estado')
      ->join('estado_turno','estado_turno.idestado_turno','=','turno_usuarios.id_estado_turno')
      ->where('turno_usuarios.id',$turno)
      ->first();
      $usuario=Auth()->user();
      $tramites=\DB::table('asignacion')
      ->select('tramites_taquilla.idtramite','asignacion.idtaquilla','tipo_tramites.Descripcion')
      ->join('users','users.id','=','asignacion.iduser')
      ->join('taquilla','taquilla.num_taquilla','=','asignacion.idtaquilla')
      ->join('tramites_taquilla','tramites_taquilla.idtaquilla','=','taquilla.num_taquilla')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','tramites_taquilla.idtramite')
      ->where('users.id',$usuario->id)
      ->first();
      // dd($turnos);
      return view('turnos.turnos',compact('tramites','turnos'));
    }
    public function siguienteturno()
    {
      $turno=\DB::table('turno_usuarios')
      ->select('turno_usuarios.id')
      ->join('estado_turno','estado_turno.idestado_turno','=','turno_usuarios.id_estado_turno')
      ->whereIn('turno_usuarios.id_tipotramite', function($query){
        $usuario=Auth()->user();
        $tramites=\DB::table('asignacion')
        ->select('asignacion.idtaquilla')
        ->join('users','users.id','=','asignacion.iduser')
        ->where('users.id',$usuario->id)
        ->first();
      $query->select('tramites_taquilla.idtramite')
      ->from('taquilla')
      ->join('tramites_taquilla','tramites_taquilla.idtaquilla','=','taquilla.num_taquilla')
      ->where('tramites_taquilla.idtaquilla','=',$tramites->idtaquilla)
      ->where('turno_usuarios.id_estado_turno','=',1);
    })
      ->orderBy('turno_usuarios.prioridad','DESC')
      ->orderBy('turno_usuarios.created_at')
      ->limit(1)
      ->first();
      if ($turno!=null) {
      $estado=\DB::table('turno_usuarios')
      ->where('turno_usuarios.id',$turno->id)
      ->update(['id_estado_turno'=>2]);

      $turnos=\DB::table('turno_usuarios')
      ->select('turno_usuarios.id','turno_usuarios.Num_Turno','estado_turno.nombre_estado')
      ->join('estado_turno','estado_turno.idestado_turno','=','turno_usuarios.id_estado_turno')
      ->where('turno_usuarios.id',$turno->id)
      ->first();

      $usuario=Auth()->user();
      $tramites=\DB::table('asignacion')
      ->select('tramites_taquilla.idtramite','asignacion.idtaquilla','tipo_tramites.Descripcion')
      ->join('users','users.id','=','asignacion.iduser')
      ->join('taquilla','taquilla.num_taquilla','=','asignacion.idtaquilla')
      ->join('tramites_taquilla','tramites_taquilla.idtaquilla','=','taquilla.num_taquilla')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','tramites_taquilla.idtramite')
      ->where('users.id',$usuario->id)
      ->first();

      $conteo=\DB::table('turno_usuarios')
      ->select(\DB::raw('count(*) as conteo'),'tipo_tramites.Descripcion')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','turno_usuarios.id_tipotramite')
      ->whereIn('turno_usuarios.id_tipotramite', function($query){
          $usuario=Auth()->user();
          $tramites=\DB::table('asignacion')
          ->select('asignacion.idtaquilla')
          ->join('users','users.id','=','asignacion.iduser')
          ->where('users.id',$usuario->id)
          ->first();
          $query->select('tramites_taquilla.idtramite')
          ->from('taquilla')
          ->join('tramites_taquilla','tramites_taquilla.idtaquilla','=','taquilla.num_taquilla')
          ->where('tramites_taquilla.idtaquilla','=',$tramites->idtaquilla);
      })
      ->groupBy('tipo_tramites.Descripcion')
      ->get();
    }else {
      return redirect('turnos')->with('msj', 'No se encuentran mas turnos disponibles');
    }
      // dd($turno);
      return view('turnos.turnos',compact('tramites','turnos','conteo'));
    }
    protected function cambioestado($turno,$taquilla)
    {
        \DB::table('turno_usuarios')
        ->where('turno_usuarios.id',$turno)
        ->update(['id_estado_turno'=>3]);
        $turnos=\DB::table('turno_usuarios')
        ->select('turno_usuarios.id','turno_usuarios.Num_Turno','estado_turno.nombre_estado',
                  'turno_usuarios.id_tipotramite','turno_usuarios.cedulaUsuario','turno_usuarios.created_at','turno_usuarios.id_estado_turno')
        ->join('estado_turno','estado_turno.idestado_turno','=','turno_usuarios.id_estado_turno')
        ->where('turno_usuarios.id',$turno)
        ->first();
      $usuario=Auth()->user();
      // $estado2=$turnos->id_estado_turno;
      $tramites=\DB::table('asignacion')
      ->select('tramites_taquilla.idtramite','asignacion.idtaquilla','tipo_tramites.Descripcion')
      ->join('users','users.id','=','asignacion.iduser')
      ->join('taquilla','taquilla.num_taquilla','=','asignacion.idtaquilla')
      ->join('tramites_taquilla','tramites_taquilla.idtaquilla','=','taquilla.num_taquilla')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','tramites_taquilla.idtramite')
      ->where('users.id',$usuario->id)
      ->first();
      $conteo=\DB::table('turno_usuarios')
      ->select(\DB::raw('count(*) as conteo'),'tipo_tramites.Descripcion')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','turno_usuarios.id_tipotramite')
      ->whereIn('turno_usuarios.id_tipotramite', function($query){
          $usuario=Auth()->user();
          $tramites=\DB::table('asignacion')
          ->select('asignacion.idtaquilla')
          ->join('users','users.id','=','asignacion.iduser')
          ->where('users.id',$usuario->id)
          ->first();
          $query->select('tramites_taquilla.idtramite')
          ->from('taquilla')
          ->join('tramites_taquilla','tramites_taquilla.idtaquilla','=','taquilla.num_taquilla')
          ->where('tramites_taquilla.idtaquilla','=',$tramites->idtaquilla);
      })
      ->groupBy('tipo_tramites.Descripcion')
      ->get();
      //buscamos el turno mas pronto a atender
      $minimos=\DB::table('turno_usuarios')
      ->select (\DB::raw('min(created_at) as minimo'))
      ->where('turno_usuarios.id_tipotramite',$tramites->idtramite)
      ->where('turno_usuarios.id_estado_turno',1)
      // ->orwhere('turno_usuarios.id_estado_turno',2)
      ->distinct()
      ->first();
      \DB::table('visita')
      ->insert([
        'documento'=>$turnos->cedulaUsuario,
        'id_tipo_tramite'=>$turnos->id_tipotramite,
        'num_turno'=>$turnos->Num_Turno,
        'fecha_creacion'=>$turnos->created_at,
        'num_taquilla'=>$taquilla,
      ]);
      return view('turnos/turnos',compact('conteo','tramites','turnos'));
    }
    protected function transferir($cliente){
      $tramites=\DB::table('tipo_tramites')->get();
      $turno=\DB::table('turno_usuarios')->where('id',$cliente)->first();

      return view('taquillas.transferir',compact('tramites','turno'));
    }
      protected function cambiotramite(Request $request,$cliente){

        \DB::table('turno_usuarios')->where('id',$cliente)
        ->update(['id_tipotramite'=>$request['idtramite'],
                  'id_estado_turno'=>1
      ]);
        return redirect('/turnos');

      }
      protected function evaluacion($cliente){
        $turno=\DB::table('turno_usuarios')->where('id',$cliente)->first();

        return view('taquillas.evaluacion',compact('turno'));

      }
        protected function agregarevaluacion(Request $request,$cliente)
        {
            $turno=\DB::table('turno_usuarios')->where('id',$cliente)->first();
            // $dt=new DateTime;
            $date = Carbon::now();
            // dd($date);
            \DB::table('visita')
            ->where('documento',$turno->cedulaUsuario)
            ->where('fecha_creacion',$turno->created_at)
            ->update(['evaluacion'=>$request['califica'],
                      'fin_atencion'=>$date
            ]);
            \DB::table('turno_usuarios')->where('id',$cliente)->delete();
            return redirect('/turnos');
        }
        protected function posponer($turno)
        {
          $fecha=\DB::table('turno_usuarios')
          ->select('created_at')
          ->where('id',$turno)
          ->first();

          $aum=strtotime('10 minutes', strtotime($fecha->created_at));
          $aum=date('y-m-d H:i:s ',$aum);
          // dd($aum);
          $cambio=\DB::table('turno_usuarios')
          ->where('id',$turno)
          ->update(['created_at'=>$aum,
                    'id_estado_turno'=>1
          ]);
          return redirect('/turnos/llamando');
        }
        protected function abandono($turno,$taquilla)
        {
          $cliente=\DB::table('turno_usuarios')
          ->where('id',$turno)
          ->first();

          \DB::table('visita')
          ->insert([
                    'documento'=>$cliente->cedulaUsuario,
                    'id_tipo_tramite'=>$cliente->id_tipotramite,
                    'num_turno'=>$cliente->Num_Turno,
                    'fecha_creacion'=>$cliente->created_at,
                    'num_taquilla'=>$taquilla,
                    'abandono'=>1
          ]);

          \DB::table('turno_usuarios')
          ->where('id',$turno)
          ->delete();
          return redirect('/turnos');

          // dd($cliente);
        }
}
