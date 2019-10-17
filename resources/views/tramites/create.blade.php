@extends('layouts.app2')

@section('content')
  <div class="container">

      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Registrar Nuevo Tramite') }}</div>
                  <div class="card-body">
                      <form  method="POST" action="{{url('/tramites')}}">
                          @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Del Nuevo Tramite') }}</label>
                              <div class="col-md-6">
                                  <input id="tramite" type="text" class="form-control @error('name') is-invalid @enderror" name="Descripcion" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Letra Del Tramite') }}</label>
                            <div class="col-md-6">
                              <input id="tramite" type="text" class="form-control @error('name') is-invalid @enderror" name="Letra" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Registrar') }}
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>



@endsection
