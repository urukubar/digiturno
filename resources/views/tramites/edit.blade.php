@extends('layouts.app2')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Editar Tramite') }}</div>
          <div class="card-body">
            @foreach($servicios as $servicio)
              <form class="" action="{{url('/tramites/'.$servicio->idservicio)}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                  <label for="exampleInputEmail1">ID Servicio: </label>
                  <label for="exampleInputEmail1">{{$servicio->idservicio}}</label>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$servicio->nombre}}">
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
              @endforeach
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
