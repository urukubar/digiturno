@extends('layouts.app2')

@section('content')
  @foreach($usuarios as $usuario)
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Editar Usuario') }}</div>
          <div class="card-body">
            <form class="" action="{{url('/usuarios/'.$usuario->id)}}" method="post">
              {{csrf_field()}}
              {{method_field('PATCH')}}
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$usuario->name}}">
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$usuario->email}}">
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                {{-- <div class="form-group">
                  <label for="exampleFormControlSelect1">Tramite</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="num_taquilla">
                    <option value="null">Sin Taquilla</option>
                    @foreach($tramites as $tramite)
                      <option value="{{$tramite->num_taquilla}}">Taquilla {{$tramite->num_taquilla}}</option>
                    @endforeach
                  </select>
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
                @endforeach
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
