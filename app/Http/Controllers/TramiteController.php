<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use app\Tramites;

class TramiteController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


    public function index()
    {
      $servicios=\DB::table('tipo_tramites')
      ->get();
      return view('tramites.tramites',compact('servicios'));
    }


    public function edit($id)
    {
      $servicios=\DB::table('tipo_tramites')
      ->where('tipo_tramites.id_tipo_tramite',$id)
      ->get();
      return view('tramites.edit',compact('servicios'));

    }
    public  function update(Request $request,$id )
    {
      $datos=request()->except(['_token','_method']);
      \DB::table('tipo_tramites')
      ->where('tipo_tramites.id_tipo_tramite',$id)
      ->update($datos);

      return redirect('tramites/tramites');

    }
    public function show()
    {
      $servicios=\DB::table('tipo_tramites')
      ->get();
      return view('tramites.tramites',compact('servicios'));
    }

    public function destroy($id)
    {
      $servicio=\DB::table('tipo_tramites')
      ->where('tipo_tramites.id_tipo_tramite',$id)
      ->delete();
      return redirect('tramites');
    }

    public function store(Request $request){
      // $datos=request()->all();
      $datos=request()->except('_token');
      \DB::table('tipo_tramites')
      ->insert([
        'Descripcion'=>$request['Descripcion'],
        'Letra'=>$request['Letra']
      ]);
        return redirect('tramites/tramites');

    }

}
