@extends('layouts.app2')

@section('content')
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <div class="container">
      <div class="row profile">
  		<div class="col-md-3">
  			<div class="profile-sidebar">

  			    <!-- SIDEBAR MENU -->
  				<div class="profile-usermenu">
  					<h3>Usuario: </h3>
            <input type="text" name="" value="{{ Auth::user()->name }}" >
            <h3>Taquilla</h3>
            <input type="text" name="" value="">
            <h3>Estado</h3>
            <input type="text" name="" value="{{$turnos->nombre}}">
            <h3>Turno</h3>
            <input type="text" name="" value="{{$turnos->turno}}">

            <br>
            <br>
            <br>
  				</div>
  				<!-- END MENU -->

  				<!-- SIDEBAR BUTTONS -->
  				<div class="profile-userbuttons">
            <a href="{{route('turnos')}}" class="btn btn-success btn-sm">Siguiente</a>
            <a href="{{route('turnos2',$turnos->idcliente)}}" class="btn btn-danger btn-sm">Atender</a>
  					{{-- <button type="button" class="btn btn-danger btn-sm">Atender</button> --}}
  				</div>
  				<!-- END SIDEBAR BUTTONS -->

  			</div>
  		</div>
  		<div class="col-md-7">
              <div class="profile-content">
                <table class="table table-xs">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tramite</th>
                      <th scope="col">Cantidad</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                      @foreach($servicios as $servicio)
                      <th scope="row"></th>
                      <td>{{$servicio->nombre}}</td>
                      <td>{{$conteo->conteo}}</td>
                      @endforeach
                    </tr>
                  </tbody>
                </table>
              </div>
  		</div>
  	</div>
  </div>

  <br>
  <br>



  {{-- <div class="card-deck" >

@foreach($servicios as $servicio)
  <br>
  <br>
  <div class="col-sm-6 col-md-4 ">
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
  </div> --}}
@endsection
