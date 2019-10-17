@extends('layouts.app2')

@section('content')
  <div class="container">

      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Registrar Nuevo Taquillas') }}</div>

                  <div class="card-body">
                      <form  method="POST" action="{{url('/taquillas')}}">
                          @csrf
                          <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="exampleInputEmail1">Numero De La Taquilla</label>
                            <div class="col-md-6">
                              <input type="text" name="num_taquilla" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Numero Taquilla" value="">
                            </div>
                          </div>
                          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
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
