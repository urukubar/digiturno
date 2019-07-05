<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaquillaController extends Controller
{
    public function index()
    {
      $taquillas =\DB::table('taquilla')
      ->select('taquilla.num_taquilla','users.name')
      ->join('users','users.id','=','taquilla.idusuario')
      ->get();
      $taquillas2=\DB::table('taquilla')
      ->where('taquilla.idusuario',null)
      ->get();
      return view('taquillas.taquillas',compact('taquillas','taquillas2'));
    }

    public function edit($id)
    {
      $taquillas=\DB::table('taquilla')
      ->where('taquilla.num_taquilla',$id)
      ->get();
      return view('taquillas/edit',compact('taquillas'));

    }

    public  function update(Request $request,$id )
    {
      $datos=request()->except(['_token','_method']);
      \DB::table('taquilla')
      ->where('taquilla.num_taquilla',$id)
      ->update($datos);

      return redirect('/taquillas');

    }

    public function destroy($id)
    {
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
