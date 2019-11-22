@extends ('layouts.menu')
@section ('contenido')
<div class="modal-content">
    <div class="modal-header bg-dark">
        <h3 class="fa fa-edit"> Registrar Usuario:</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>
            {!!Form::open(array('url'=>'seguridad/usuario','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="nombre" class="col-md-4 col-form-label">{{('Nombre') }}</label>

                        <div class="form-group">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="Ingrese su Nombre" name="nombre" value="{{ old('nombre') }}"  autocomplete="nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$" autofocus>

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="email" class="col-md-4 col-form-label">{{('Email') }}</label>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese su Correo Electrónico" name="email" value="{{ old('email') }}"  autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="password" class="col-md-4 col-form-label">{{('Contraseña') }}</label>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingrese Contraseña" name="password"  autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="password-confirm" class="col-md-4 col-form-label">{{('C.Contraseña') }}</label>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control @error('email') is-invalid @enderror" name="password_confirmation" placeholder="Confirme Contraseña"  autocomplete="new-password">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="telefono" class="col-md-4 col-form-label">{{('Telefono')}}</label>
                        <div class="form-group">
                            <input id="telefono" type="number" class="form-control" name="telefono" value="{{old('telefono')}}" placeholder="Ingrese su Telefono"  pattern="[0-9]{0,15}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="direccion" class="col-md-4 col-form-label">{{('Dirección') }}</label>
                        <div class="form-group">
                            <input id="direccion" type="text" class="form-control"  name="direccion" value="{{ old('direccion') }}" placeholder="Ingrese su Dirección" pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="documento" class="col-md-4 col-form-label">{{('Documento') }}</label>
                        <div class="form-group">
                            <select class="form-control" name="tipo_documento" id="tipo_documento">
                                <option value="0" disabled>Selecione</option>
                                <option value="DNI">DNI</option>
                                <option value="RUC">RUC</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="num_documento" class="col-md-4 col-form-label">{{('N°.documento')}}</label>
                        <div class="form-group">
                            <input type="text" name="num_documento" id="num_documento" class="form-control" placeholder="Ingrese el número documento" pattern="[0-9]{0,15}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="rol" class="col-md-4 col-form-label">{{('Rol')}}</label>
                        <div class="form-group">
                            <select name="" name="id_rol" id="id_rol" class="form-control">
                                <option value="0" disabled>Seleccione *</option>
                                @foreach($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="usuario" class="col-md-4 col-form-label">{{('Usuario')}}</label>
                        <div class="form-group">
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese su usuario" pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="imagen" class="col-md-4 col-form-label">{{('Imagen') }}</label>
                        <input type="file" id="imagen" name="imagen">
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-save"></i><b> {{('Registrar') }}</b>
                        </button>
                    </div>
            </div>
            {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection