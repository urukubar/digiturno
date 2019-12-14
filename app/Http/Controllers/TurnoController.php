<?php

namespace App\Http\Controllers;

use App\turno_usuarios;
use App\tipo_tramites;
use App\Http\Requests\CreateTurnoUsuariosRequest;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function registro(CreateTurnoUsuariosRequest $request)
    {
      $letra=\DB::table('tipo_tramites')
      ->select('Letra','Num_turno')
      ->where('id_tipo_tramite',$request->input('opcion_caja_tramite'))
      ->first();

      if ($letra->Num_turno == 999) {
        $turno=1;
      }
      else {
        $turno=$letra->Num_turno+1;
      }

      $registro = turno_usuarios::create([
        'cedulaUsuario' => $request->input('cedula'),
        'id_tipotramite' => $request->input('opcion_caja_tramite'),
        'Num_Turno'=> $turno,
        'id_estado_turno'=> 1,
        'prioridad' => $request->input('opcion_prioridad')
      ]);

      $cambioT=\DB::table('tipo_tramites')
      ->where('id_tipo_tramite',$request->input('opcion_caja_tramite'));
      $cambioT->update(['Num_turno'=>$turno]);


      // dd($cambioT);
       return redirect ('/');
    }
}
