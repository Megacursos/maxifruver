@extends('layouts.menu')
@section('title','Categorias')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  mt-2">
		<a href="categoria"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> Categorías </strong></button></a>
		<a href="categoria/create"><button class="btn btn-success border-success"><i class="fa fa-plus-circle"></i>Nuevo</button></a>
	</div>
    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 mt-2">
        @include('productos.categoria.search')
    </div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive"><br>
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#00bfa5" class="text-center">
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($categorias as $cat)
				<tr class="text-center">
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->descripcion}}</td>
					<td>
						@if($cat->condicion=="1")
						<button type="button" class="btn btn-success btn-md">
							<i class="fa fa-check"></i> Activo
						</button>
						@else
						<button type="button" class="btn btn-danger btn-md">
							<i class="fa fa-check"></i> Desactivado
						</button>
						@endif
					</td>
					<td>
						<button type="button" class="btn btn-outline-info" data-id_categoria="{{$cat->id}}" data-nombre="{{$cat->nombre}}" data-descripcion="{{$cat->descripcion}}" data-toggle="modal" data-target="#abrirmodalEditar"><i class="fa fa-edit"></i>
						</button> &nbsp;

                        @if($cat->condicion)
                        <button type="button" class="btn btn-outline-danger" data-id_categoria="{{$cat->id}}" data-toggle="modal" data-target="#cambiarEstado">
                            <i class="fa fa-times-circle"></i> Desactivar
                        </button>
                        @else
                        <button type="button" class="btn btn-success" data-id_categoria="{{$cat->id}}" data-toggle="modal" data-target="#cambiarEstado">
                            <i class="fa fa-lock"></i> Activar
                        </button>
                        @endif
                    </td>
				</tr>
				@include('productos.categoria.modal')
				@endforeach
			</table>
		</div>
		{{$categorias->render()}}
	</div>
</div>


<div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title m-auto">Actualizar categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('categoria.update','test')}}" method="post" class="form-horizontal">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <input type="hidden" id="id_categoria" name="id_categoria" value="">
                    @include('productos.categoria.edit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection