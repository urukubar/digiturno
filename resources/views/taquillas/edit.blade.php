@extends('layouts.app2')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Editar Tramite') }}</div>
          <div class="card-body">
            @foreach($taquillas as $taquilla)
              <form class="" action="{{url('/taquillas/'.$taquilla->num_taquilla)}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                  <label for="exampleInputEmail1">ID Taquilla: </label>
                  <label for="exampleInputEmail1">{{$taquilla->num_taquilla}}</label>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Numero De La Taquilla</label>
                  <input type="text" name="num_taquilla" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$taquilla->num_taquilla}}">
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
