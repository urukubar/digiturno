@extends('layouts.app2')

@section('content')

  <div class="">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <a href="{{route('createtaquilla')}}" class="btn btn-primary">Agregar Taquilla</a>
        <br/>
        <br>
        <div class="card">
    <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Numero Taquilla</th>
        <th scope="col">Usuario Actual</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
    @foreach($taquillas as $taquilla)
    <tr>
      <th scope="row"></th>
      <td>Taquilla {{$taquilla->num_taquilla}}</td>
      <td>{{$taquilla->name}}</td>
      <td>
        <a href="{{url('/taquillas/'.$taquilla->num_taquilla.'/edit')}}" >Editar |</a>

        <form class="" action="{{ url('/taquillas/'.$taquilla->num_taquilla)}}" method="post">
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <button type="submit" onclick="return confirm('¿desea borrar este usuario?')" >Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
    @foreach($taquillas2 as $taquilla2)
    <tr>
      <th scope="row"></th>
      <td>Taquilla {{$taquilla2->num_taquilla}}</td>
      <td></td>
      <td>
        <a href="{{url('/taquillas/'.$taquilla2->num_taquilla.'/edit')}}" >Editar |</a>

        <form class="" action="{{ url('/taquillas/'.$taquilla2->num_taquilla)}}" method="post">
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
