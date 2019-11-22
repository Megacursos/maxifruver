@extends ('layouts.menu')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 mt-2">
		<a href="productos"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> Productos </strong></button></a>
        <a href="productos/create"><button class="btn btn-success border-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Nuevo</button></a>
        <a href="{{url('listarProductoPdf')}}" target="_blank">
	        <button type="button" class="btn btn-danger">
	        	<i class="fa fa-file"></i>&nbsp;&nbsp;PDF
	        </button>
	    </a>
	</div>
		<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 mt-2 mt-2">
            @include('productos.productos.search')
        </div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive"><br>
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead style="background-color:#00bfa5">
					<th>Categoria</th>
                    <th>Producto</th>
                    <th>Codigo</th>
                    <th>Precio Venta</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Estado</th>
                    <th>Cambiar Estado</th>
				</thead>
                <tbody>
               @foreach($productos as $prod)
				<tr>
					<td>{{$prod->categoria}}</td>
					<td>{{$prod->nombre}}</td>
					<td>{{$prod->codigo}}</td>
					<td>{{$prod->precio_venta}}</td>
					<td>{{$prod->stock}}</td>
					<td>
					   <img src="{{asset('storage/img/productos/'.$prod->imagen)}}" id="imagen1" class="img-responsive" width="60px" height="60px">
					</td>
					<td>
					@if($prod->condicion=="1")
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
                        <button type="button" class="btn btn-info" data-id_producto="{{$prod->id}}" data-id_categoria="{{$prod->idcategoria}}" data-codigo="{{$prod->codigo}}" data-stock="{{$prod->stock}}" data-nombre="{{$prod->nombre}}" data-precio_venta="{{$prod->precio_venta}}"  data-toggle="modal" data-target="#abrirmodalEditar">
                        	<i class="fa fa-edit"></i> Editar
                        </button> &nbsp;

                       @if($prod->condicion)
                        <button type="button" class="btn btn-danger" data-id_producto="{{$prod->id}}" data-toggle="modal" data-target="#cambiarEstado">
                            <i class="fa fa-times"></i> Desactivar
                        </button>
                        @else
                         <button type="button" class="btn btn-success" data-id_producto="{{$prod->id}}" data-toggle="modal" data-target="#cambiarEstado">
                            <i class="fa fa-lock"></i> Activar
                        </button>
                        @endif
                    </td>
                </tr>
				@include('productos.productos.modal')
				@endforeach
            </tbody>
			</table>
            {{$productos->render()}}
		</div>
	</div>
</div>


<div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">


                <form action="{{route('productos.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                    {{method_field('patch')}}
                    {{csrf_field()}}

                    <input type="hidden" id="id_producto" name="id_producto" value="">

                    @include('productos.productos.edit')

                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection