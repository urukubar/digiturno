@extends('layouts.app2')

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="{{ route('register') }}" class="btn btn-primary">Agregar Usuario</a>
      <br/>
      <br>
      <div class="card">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">E-mail</th>
      <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>
    @foreach($usuarios as $usuario)
    <tr>
      <th scope="row">{{$usuario->id}}</th>
      <td>{{$usuario->name}}</td>
      <td>{{$usuario->email}}</td>
      {{-- <td>{{$usuario->idtramite}}</td> --}}
      <td>
        <a href="{{url('/usuarios/'.$usuario->id.'/edit')}}">Editar |</a>
        <form class="" action="{{ url('/usuarios/'.$usuario->id)}}" method="post">
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <button type="submit" onclick="return confirm('¿desea borrar este usuario?')">Eliminar</button>
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
