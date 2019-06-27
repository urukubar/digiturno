@extends('layouts.app2')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Cambiar Contraseña') }}</div>
          <div class="card-body">
            <form class="" action="{{url('/usuarios/'.$usuario->id)}}" method="post">
              {{csrf_field()}}
              {{method_field('PATCH')}}
                <div class="form-group">
                  <label for="exampleInputEmail1">Password Actual</label>
                  <input type="password" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese Contraseña Actual" value="">
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nuevo Password</label>
                  <input type="password" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nueva Contraseña" value="">
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nuevo Password</label>
                  <input type="password" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Repita Contraseña" value="">
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>

                <button type="submit" class="btn btn-primary">Cambiar</button>

            </form>
          </div>
        </div>
      </div>
    </div>


@endsection
