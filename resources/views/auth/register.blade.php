@extends('layouts.app2')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Nuevo Usuario') }}</div>

                <div class="card-body">
                  @if (session()->has('msj'))
                    <div class="alert alert-success" role="alert">
                      {{session('msj')}}
                    </div>
                  @endif
                  @if (session()->has('msj2'))
                    <div class="alert alert-danger" role="alert">
                      {{session('msj2')}}
                    </div>
                  @endif

                    <form method="POST" action="{{ url('/registro') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password1" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password2" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Taquilla') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="exampleFormControlSelect1" name="num_taquilla">
                                  @foreach($tramites as $tramite)
                                    <option value="{{$tramite->num_taquilla}}">Taquilla {{$tramite->num_taquilla}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
