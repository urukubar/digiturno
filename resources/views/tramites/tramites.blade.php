@extends('layouts.app2')

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="{{route('createtramite')}}" class="btn btn-primary">Agregar Tramite</a>
      <br/>
      <br>
      <div class="card">
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($servicios as $servicio)
  <tr>
    <th scope="row">{{$servicio->idservicio}}</th>
    <td>{{$servicio->nombre}}</td>
    <td>
      <a href="{{url('/tramites/'.$servicio->idservicio.'/edit')}}" >Editar |</a>

      <form class="" action="{{ url('/tramites/'.$servicio->idservicio)}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <button type="submit" onclick="return confirm('¿desea borrar este usuario?')" >Eliminar</button>
      </form>
    </td>
  </tr>
  @endforeach
  </tbody>
  </table>
</div>
</div>
</div>
</div>

@endsection
