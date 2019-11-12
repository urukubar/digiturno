<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaquillaController extends Controller
{
    public function index()
    {
      $taquillas =\DB::table('taquilla')
      ->select('taquilla.num_taquilla', 'tipo_tramites.Descripcion','users.name')
      ->join('tramites_taquilla','tramites_taquilla.idtaquilla','=','taquilla.num_taquilla','left outer')
      ->join('tipo_tramites','tipo_tramites.id_tipo_tramite','=','tramites_taquilla.idtramite','left outer')
      ->join('asignacion','asignacion.idtaquilla','=','taquilla.num_taquilla','left outer')
      ->join('users','users.id','=','asignacion.iduser','left outer')
      ->get();
      return view('taquillas.taquillas',compact('taquillas'));
    }

    public function edit($id)
    {
      $taquillas=\DB::table('taquilla')
      ->where('taquilla.num_taquilla',$id)
      ->get();
      $usuarios=\DB::table('users')->get();
      $tramites=\DB::table('tipo_tramites')->get();
      return view('taquillas/edit',compact('taquillas','usuarios','tramites'));

    }

    public  function update(Request $request,$id )
    {
      $datos=request()->except(['_token','_method','idusuario','idtramite']);
      \DB::table('taquilla')
      ->where('taquilla.num_taquilla',$id)
      ->update($datos);
      //
      $usuario_taquilla=\DB::table('asignacion')->WHERE('idtaquilla',$id)->get();
      $tramite_taquilla=\DB::table('tramites_taquilla')->WHERE('idtaquilla',$id)->get();

      if (count($usuario_taquilla)>0) {
        \DB::table('asignacion')->where('idtaquilla',$id)->update(['iduser'=>$request['idusuario']]);
      }else {
        \DB::table('asignacion')
        ->insert([
          'idtaquilla'=>$id,
          'iduser'=>$request['idusuario']
          ]);
      }
      $tramites=$request->idtramite;
       if (count($tramite_taquilla)>0) {
         \DB::table('tramites_taquilla')->where('idtaquilla',$id)->delete();
         foreach ($tramites as $tramite) {
           \DB::table('tramites_taquilla')
             ->insert([
               'idtaquilla'=>$id,
               'idtramite'=>$tramite
               ]);
         }
       }else {
         foreach ($tramites as $tramite) {
           \DB::table('tramites_taquilla')
             ->insert([
               'idtaquilla'=>$id,
               'idtramite'=>$tramite
               ]);
         }
       }
       return redirect('/taquillas');
    }
    public function destroy($id)
    {
      \DB::table('asignacion')
      ->where('idtaquilla', $id)
      ->delete();
      \DB::table('tramites_taquilla')
      ->where('idtaquilla', $id)
      ->delete();
      $servicio=\DB::table('taquilla')
      ->where('taquilla.num_taquilla',$id)
      ->delete();
      return redirect('/taquillas');
    }
    public function store(Request $request){
      // $datos=request()->all();
      $datos=request()->except('_token');
      \DB::table('taquilla')
      ->insert([
        'num_taquilla'=>$request['num_taquilla']
        ]);
        return redirect('/taquillas');
    }
    public function show()
    {
      $taquillas=\DB::table('taquilla')
      ->get();
      return view('taquillas.taquillas',compact('taquillas'));
    }

}
