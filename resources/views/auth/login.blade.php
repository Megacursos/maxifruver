@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-white" style="background-color: rgb(0,0,0,0.5);">
                <div class="card-header text-center text-warning" style="background-color: rgb(0,0,0,0.7);"><b>{{('Iniciar Sesión') }}
                <i class="fa fa-user-shield"></i></b>
                </div>
                <div class="card-body">
                    <form class="form-horizontal was-validated" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-light"><b>{{('Usuario') }}</b></label>

                            <div class="col-md-8">
                                <input id="usuario" name="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror"  value="{{ old('usuario') }}" placeholder="Usuario">
                                @error('usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-light"><b>{{('Contraseña') }}</b></label>

                            <div class="col-md-8">
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-light" for="remember">
                                        <b>{{('Recordar Cuenta') }}</b>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-warning">
                                    {{('Ingresar') }}
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
