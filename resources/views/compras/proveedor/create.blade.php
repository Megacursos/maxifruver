@extends ('layouts.menu')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<a href="{{asset('compras/proveedor')}}"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> Proveedores </strong></button></a>
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
			{!!Form::open(array('url'=>'compras/proveedor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{old('nombre')}}"  class="form-control" placeholder="Nombre..." pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" value="{{old('direccion')}}"  class="form-control" placeholder="Dirección..." pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Documento</label>
                <select name="tipo_documento"  class="form-control number" >
                    <option value="0" disabled>Seleccione *</option>
                    <option value="DNI">DNI</option>
                    <option value="RUC">RUC</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="num_documento">Número de documento</label>
                <input type="number" name="num_documento" required value="{{old('num_documento')}}" class="form-control" placeholder="Número de documento..." pattern="[0-9]{0,15}">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="number" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Teléfono...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" required value="{{old('email')}}" class="form-control" placeholder="Ingrese su Email...">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    	{!!Form::close()!!}
@endsection