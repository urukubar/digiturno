
@extends('layouts.app2')
@section('content')
    <form class="" action="{{url('/envioevaluacion/'.$turno->id)}}" method="post">
      {{csrf_field()}}
          <div class="container-fluid col-md-8 col-lg-6" style="margin-top: 80px; border: 2px solid black">
              <h1 style="text-align: center">Selecciona tu calificación</h1>
              <div class="card" style="width: 100%; margin-bottom: 20px; margin-top: 20px; border:1.5px solid black">
                <div class="card-body">
                  <input type="text" style="display:none" id="calificacion" name="califica" value="">
                  <button type="submit" onclick="digitar(4)" md-6 class="btn btn-success btn-lg btn-block">Excelente</button>
                  <button type="submit" onclick="digitar(3)" md-6 class="btn btn-primary btn-lg btn-block">Bueno</button>
                  <button type="submit" onclick="digitar(2)" md-6 class="btn btn-warning btn-lg btn-block">Regular</button>
                  <button type="submit" onclick="digitar(1)" md-6 class="btn btn-danger btn-lg btn-block">Malo</button>
                </div>
              </div>
            </div>
          </form>
@endsection
