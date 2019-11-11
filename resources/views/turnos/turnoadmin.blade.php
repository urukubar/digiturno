@extends('layouts.app2')

@section('content')
    <div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tramite</th>
                  <th scope="col">Letra</th>
                  <th scope="col">Turnos</th>
                  {{-- <th scope="col">Cantidad</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ($tramites as $tramite)
                  <tr>
                    <td scope="row"> {{$loop->iteration}}</td>
                    <td><a href="{{url('/turnostramite/'.$tramite->id_tipo_tramite)}}"> {{$tramite->Descripcion}} </a></td>
                    <td>{{$tramite->Letra}}</td>
                    <td>{{$tramite->conteo}}</td>

                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
