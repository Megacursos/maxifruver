@extends ('layouts.menu')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<a href="usuario"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> Usuarios </strong></button></a>
        <a href="usuario/create"><button class="btn btn-success border-success" data-toggle="modal" data-target="#abrirmodal"><i class="fa fa-plus-circle"></i> Nuevo</button></a>
        <hr>
	</div>
        <div class="mt-3">
            @include('seguridad.usuario.search')
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <button type="button" class="btn btn-outline-success border-success text-bold">Excel</button>
            <button type="button" class="btn btn-outline-danger border-danger text-bold">PDF</button>
        </div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive"><br>
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#00bfa5">
					<th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Imagen</th>
                    <th>Estado</th>
                    <th>Cambiar Estado</th>
				</thead>
               <tbody>
               	@foreach($usuarios as $user)
                <tr>
                    <td>{{$user->nombre.'-'.$user->rol}}</td>
                    <td>{{$user->direccion}}</td>
                    <td>{{$user->telefono}}</td>
                    <td>
                    	<img src="{{asset('storage/img/usuarios/'.$user->imagen)}}" id="imagen1" alt="{{$user->nombre}}" class="img-responsive" width="100px" height="100px">
                    </td>
                    <td>
                    	@if($user->condicion=="1")
                    	<button type="button" class="btn btn-success border-success">
                    		<i class="fa fa-check-circle"></i> Activo
                    	</button>
                    	@else
                    	<button type="button" class="btn btn-danger border-danger">
                    		<i class="fa fa-check-circle"></i> Desactivado
                    	</button>
                    	@endif
                    </td>
                    <td>
                    	<button type="button" class="btn btn-info btn-md" data-id_usuario="{{$user->id}}" data-nombre="{{$user->nombre}}" data-tipo_documento="{{$user->tipo_documento}}" data-num_documento="{{$user->num_documento}}" data-direccion="{{$user->direccion}}" data-telefono="{{$user->telefono}}" data-email="{{$user->email}}" data-id_rol="{{$user->idrol}}"  data-usuario="{{$user->usuario}}"  data-imagen1="{{$user->imagen}}"  data-toggle="modal" data-target="#abrirmodalEditar">
                            <i class="fa fa-edit"></i> Editar
                        </button> &nbsp;

						@if($user->condicion)
						<button type="button" class="btn btn-danger border-danger" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#cambiarEstado">
							<i class="fa fa-times-circle"></i> Desactivar
						</button>
						@else
						<button type="button" class="btn btn-success btn-sm" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#cambiarEstado">
							<i class="fa fa-lock btn-sm"></i> Activar
						</button>
						@endif
					</td>
				</tr>
				@include('seguridad.usuario.modal')
				@endforeach
			</tbody>
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>

<div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title m-auto">Actualizar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="text-danger fa fa-times-circle"></span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{route('usuario.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <input type="hidden" id="id_usuario" name="id_usuario" value="">
                    @include('seguridad.usuario.edit')
                </form>
            </div>
        </div>
    </div>
</div>

@endsection