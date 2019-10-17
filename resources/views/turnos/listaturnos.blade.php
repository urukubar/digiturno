@extends('layouts.app2')

@section('content')
  <div class="">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Cedula</th>
                <th scope="col">Turno</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($turnos as $turno)
                <tr>
                  <td scope="row">{{$loop->iteration}}</td>
                  <td>{{$turno->cedulaUsuario}}</td>
                  <td>{{$turno->Num_Turno}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
