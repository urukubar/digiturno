@extends('layouts.app2')

@section('content')

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('transferir turno ') }}</div>
          <div class="card-body">
              <form class="" action="{{url('/cambiotramite/'.$turno->id)}}" method="post">
                {{csrf_field()}}
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right" for="exampleInputEmail1">Turno </label>
                  <div class="col-md-6">
                    <label class="col-md-4 col-form-label text-md-left" for="exampleInputEmail1">{{$turno->Num_Turno}} </label>
                  </div>
                </div>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">{{ __('Tramite') }}</label>
                  <div class="col-md-6">
                    <select class="form-control" id="exampleFormControlSelect1" name="idtramite">
                      @foreach ($tramites as $tramite)
                      <option value="{{$tramite->id_tipo_tramite}}">{{$tramite->Descripcion}} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Registrar') }}
                    </button>
                  </div>
              </form>
      </div>
    </div>
  </div>
</div>

@endsection
