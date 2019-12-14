<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagenes;
use App\tipo_tramites;


class LogoController extends Controller
{
    public function cargarDatos()
    {
      // Traer datos de la BBD
      $Logo = Imagenes::all();
      $tipoTramite = tipo_tramites::all();
      // View Json array
      // dd($Logo);

      return view('ventanillaTramite', [
        'Logo' => $Logo,
        'tipoTramite' => $tipoTramite,
      ]);

    }
}
