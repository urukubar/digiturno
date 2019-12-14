@extends('layouts.app2')

@section('content')
<div class="container">
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
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="exampleInputEmail1">Numero De La Taquilla</label>
                            <div class="col-md-6">
                                <input type="text" name="num_taquilla" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$taquilla->num_taquilla}}">
                            </div>
                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="exampleFormControlSelect1" name="idusuario">
                                    @foreach ($usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">{{ __('Tramite') }}</label>
                          <div class="col-md-6">

                            @foreach ($tramites as $tramite)

                            <div class="form-group form-check" >
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="idtramite[]" value="{{$tramite->id_tipo_tramite}}">
                                <label class="form-check-label" for="exampleCheck1">{{$tramite->Descripcion}}</label>
                            </div>
                            @endforeach
                          </div>

                        </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
            </form>
        </div>
    </div>
</div>
</div>

@endsection
