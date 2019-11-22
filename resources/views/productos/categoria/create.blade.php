@extends ('layouts.menu')
@section ('contenido')
	<div class="modal-content m-auto col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="modal-header">
			<a href="{{asset('productos/categoria')}}"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> Categorías </strong></button></a>
			</div>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'productos/categoria','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="modal-body col-lg-12 col-md-6 col-sm-6 col-xs-12">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de categoría" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">

            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese descripcion">
            </div>
            <div class="modal-footer form-group ml-4">
            	<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
            </div>

			{!!Form::close()!!}
	</div>
@endsection