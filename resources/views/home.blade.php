@extends('layouts.app2')

@section('content')
  <div class="card-deck" >

@foreach($servicios as $servicio)
  <br>
  <br>
  <div class="col-sm-6 col-md-4 ">
  {{-- <form class="" action="MostrarturnoController@index" method="post">
  </form> --}}

    {{-- <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <div class="caption">
          <h3 name="turno"> {{$servicio->turno}} </h3>
          <p>{{$servicio->identificacion}}</p>
          <p>{{$servicio->nombre}}</p>
          <p><a href="{{url('turnos/'.$servicio->idcliente.'/turnos')}}" class="btn btn-danger" role="button" >Llamar</a></p>
          <p><a href="" class="btn btn-primary" role="button">Atender</a></p>
          <form action="" method="POST">
        <input type="hidden" name="_token" value="" required>
        <input type="hidden" name="id" value="" required>
        <input class="btn btn-primary" role="button" type="submit" value="Atendido"/>
      </form>
        </div>
      </div>
    </div> --}}


      <div class="card" >
        <div class="card-body">
          <h5 class="card-title">Turno: {{$servicio->turno}}</h5>
          <p class="card-text">identificacion: {{$servicio->identificacion}}</p>
          <p class="card-text">Tramite: {{$servicio->nombre}}</p>
          <p><a href="{{url('turnos/'.$servicio->idtramite.'/turnos')}}" class="btn btn-danger" role="button" >Llamar</a></p>
          <p><a href="" class="btn btn-primary" role="button">Atender</a></p>
          <form action="" method="POST">
            <input type="hidden" name="_token" value="" required>
            <input type="hidden" name="id" value="" required>
            <input class="btn btn-primary" role="button" type="submit" value="Atendido"/>
      </form>
        </div>
      </div>
</div>

  @endforeach
<br>
  </div>
@endsection
