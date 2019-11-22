@extends ('layouts.menu')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<a href="{{asset('ventas/cliente')}}"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> Clientes </strong></button></a>
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
	</div>
			{!!Form::open(array('url'=>'ventas/cliente','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required value="{{old('nombre')}}"  class="form-control"  pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$" placeholder="Nombre...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion" value="{{old('direccion')}}"  class="form-control" pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$" placeholder="Dirección...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Documento</label>
                <select name="tipo_documento" id="tipo_documento" class="form-control selectpicker" data-live-search="true" >
                    <option value="0" disabled>Seleccione *</option>
                    <option value="DNI">DNI</option>
                    <option value="RUC">RUC</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="num_documento">Número de documento</label>
                <input type="text" id="num_documento" name="num_documento" required value="{{old('num_documento')}}" class="form-control" pattern="[0-9]{0,15}" placeholder="Número de documento...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" required value="{{old('telefono')}}" class="form-control" pattern="[0-9]{0,15}" placeholder="Teléfono...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="{{old('email')}}" class="form-control" placeholder="Ingrese su Email...">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary border-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger border-danger" type="reset">Limpiar</button>
            </div>
        </div>
    </div>
    	{!!Form::close()!!}
@endsection