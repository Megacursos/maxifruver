@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-white"style="background: rgb(0,0,0,0.6);">
                <div class="card-header text-center text-warning" style="background: rgb(0,0,0,0.6);"><b>{{('Registrate')}}</b><h4 class="fa fa-edit ml-3"></h4>
                </div>
                {!!Form::open(array('url'=>'seguridad/usuario','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                {{Form::token()}}

                    <div class="card-body">
                        <div class="form-group row mt-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right text-light">{{('Nombre') }}</label>

                            <div class="col-md-8">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="Ingrese su Nombre" name="nombre" value="{{ old('nombre') }}"  autocomplete="nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-light">{{('Correo Electrónico') }}</label>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese su Correo Electrónico" name="email" value="{{ old('email') }}"  autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-light">{{('Contraseña') }}</label>
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingrese Contraseña" name="password"  autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-light">{{('Confirmar Contraseña') }}</label>
                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control @error('email') is-invalid @enderror" name="password_confirmation" placeholder="Confirme Contraseña"  autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right text-light">{{('Telefono')}}</label>
                            <div class="col-md-8">
                                <input id="telefono" type="number" class="form-control" name="telefono" value="{{old('telefono')}}" placeholder="Ingrese su Telefono"  pattern="[0-9]{0,15}">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right text-light">{{('Dirección') }}</label>
                            <div class="col-md-8">
                                <input id="direccion" type="text" class="form-control"  name="direccion" value="{{ old('direccion') }}" placeholder="Ingrese su Dirección" pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="documento" class="col-md-4 col-form-label text-md-right text-light">{{('Documento') }}</label>
                            <div class="col-md-8">
                                <select class="form-control" name="tipo_documento" id="tipo_documento">
                                    <option value="0" disabled>Selecione</option>
                                    <option value="DNI">DNI</option>
                                    <option value="RUC">RUC</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="num_documento" class="col-md-4 col-form-label text-md-right text-light">{{('Numero documento')}}</label>
                            <div class="col-md-8">
                                <input type="text" name="num_documento" id="num_documento" class="form-control" placeholder="Ingrese el número documento" pattern="[0-9]{0,15}">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="rol" class="col-md-4 col-form-label text-md-right text-light">{{('Rol')}}</label>
                            <div class="col-md-8">
                                <select name="" name="id_rol" id="id_rol" class="form-control">@foreach($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right text-light">{{('Usuario')}}</label>
                            <div class="col-md-8">
                                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese su usuario" pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right text-light">{{('Imagen') }}</label>
                            <input type="file" name="imagen">
                        </div>
                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-4">
                                <button type="submit" class="btn btn-outline-warning">
                                    {{('Registrarme') }}
                                </button>
                            </div>
                        </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection
