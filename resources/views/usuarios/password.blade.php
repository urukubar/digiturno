@extends('layouts.app2')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Cambiar Contraseña') }}</div>
          <div class="card-body">
            @if (session()->has('msj'))
              <div class="alert alert-success" role="alert">
                {{session('msj')}}
              </div>
            @endif
            @if (session()->has('errormjs'))
              <div class="alert alert-danger" role="alert">
                {{session('errormjs')}}
              </div>
            @endif
            <form class="" action="{{url('/newpass/'.$usuario->id)}}" method="post">
              {{csrf_field()}}
              {{method_field('PATCH')}}
                <div class="form-group">
                  <label for="exampleInputEmail1">Contraseña Actual</label>
                  <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Ingrese Contraseña Actual" value="">
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nuevo contraseña</label>
                  <input type="password" name="newpass"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Nueva Contraseña" value="">
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                {{-- <div class="form-group">
                  <label for="exampleInputEmail1">Nuevo Password</label>
                  <input type="password" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Repita Contraseña" value="">
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div> --}}

                <button type="submit" class="btn btn-primary">Cambiar</button>

            </form>
          </div>
        </div>
      </div>
    </div>


@endsection
