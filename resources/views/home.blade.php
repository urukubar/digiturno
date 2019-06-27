@extends('layouts.app2')

@section('content')

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Bienvenido '.$usuario->name)}}</div>
          <div class="card-body">
            <form class="" action="{{url('/taquilla/'.$usuario->id)}}" method="post">
              {{csrf_field()}}
              {{method_field('PATCH')}}
                <div class="form-group">
                  <label for="exampleInputEmail1">Ingerese la Taquilla actual</label>
                  <input type="text" name="taquilla" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Numero De Taquilla" value="">
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  <br>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

@endsection
