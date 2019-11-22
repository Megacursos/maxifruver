@extends ('layouts.menu')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<a href="ingreso"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> Proveedor </strong></button></a>
        <a href="proveedor/create"><button class="btn btn-success border-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Nuevo</button></a>
        <hr>
    </div>
        <div class="mt-3">
            @include('compras.proveedor.search')
        </div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive"><br>
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#00bfa5">
					<th>Nombre</th>
					<th>Tipo Doc.</th>
					<th>Número Doc.</th>
					<th>Teléfono</th>
					<th>Email</th>
					<th>Dirección</th>
					<th>Editar</th>
				</thead>
               @foreach ($proveedores as $prove)
				<tr>
					<td>{{ $prove->nombre}}</td>
					<td>{{ $prove->tipo_documento}}</td>
					<td>{{ $prove->num_documento}}</td>
					<td>{{ $prove->telefono}}</td>
					<td>{{ $prove->email}}</td>
                    <td>{{$prove->direccion}}</td>
					<td>
						<button type="button" class="btn btn-outline-warning border-warning" data-id_proveedor="{{$prove->id}}" data-nombre="{{$prove->nombre}}" data-tipo_documento="{{$prove->tipo_documento}}" data-num_documento="{{$prove->num_documento}}" data-direccion="{{$prove->direccion}}" data-telefono="{{$prove->telefono}}" data-email="{{$prove->email}}" data-toggle="modal" data-target="#abrirmodalEditar">
						<i class="fa fa-edit"></i>
						</button> &nbsp;
						<!--<a href="" data-target="#cambiarEstado{{$prove->id}}" data-toggle="modal"><button class="btn btn-outline-danger border-danger"><i class="fa fa-trash"></i></button>
                         </a>-->
                    </td>
				</tr>
				@include('compras.proveedor.modal')
				@endforeach
			</table>
		</div>
		{{$proveedores->render()}}
	</div>
</div>


<div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-md" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title m-auto">Actualizar proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('proveedor.update','test')}}" method="post" class="form-horizontal">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <input type="hidden" id="id_proveedor" name="id_proveedor" value="">
                    @include('compras.proveedor.edit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection