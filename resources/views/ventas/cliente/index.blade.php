@extends ('layouts.menu')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<a href="cliente"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> Clientes </strong></button></a>
        <a href="cliente/create"><button class="btn btn-success border-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Nuevo</button></a>
        <hr>
	</div>
        <div class="mt-3">
            @include('ventas.cliente.search')
        </div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive"><br>
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#00bfa5">
					<th>Nombre</th>
					<th>Tipo Doc.</th>
					<th>Teléfono</th>
					<th>Email</th>
					<th>Opciones</th>
				</thead>
               @foreach ($clientes as $cli)
				<tr>
					<td>{{ $cli->nombre.'-'.$cli->direccion}}</td>
					<td>{{ $cli->tipo_documento.':'.$cli->num_documento}}</td>
					<td>{{ $cli->telefono}}</td>
					<td>{{ $cli->email}}</td>
					<td class="text-center">
						<button type="button" class="btn btn-outline-warning border-warning" data-id_cliente="{{$cli->id}}" data-nombre="{{$cli->nombre}}" data-tipo_documento="{{$cli->tipo_documento}}" data-num_documento="{{$cli->num_documento}}" data-direccion="{{$cli->direccion}}" data-telefono="{{$cli->telefono}}" data-email="{{$cli->email}}" data-toggle="modal" data-target="#abrirmodalEditar">
						 	<i class="fa fa-edit"></i>
						</button> &nbsp;
                    	<a href="ventas/cliente/modal" data-target="#modal-delete-{{$cli->id}}" data-toggle="modal"><button class="btn btn-outline-danger border-danger"><i class="fa fa-trash"></i></button>
                         </a>
                    </td>
				</tr>
				@include('ventas.cliente.modal')
				@endforeach
			</table>
		</div>
		{{$clientes->render()}}
	</div>
</div>

 <div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('cliente.update','test')}}" method="post" class="form-horizontal">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <input type="hidden" id="id_cliente" name="id_cliente" value="">
                    @include('ventas.cliente.edit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection