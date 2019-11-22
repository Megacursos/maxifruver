@extends ('layouts.menu')
@section ('contenido')
<ol class="breadcrumb">
    <li class="breadcrumb-item active col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
		<a href="compras"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> compras </strong></button></a>
        <a href="compras/create"><button class="btn btn-success border-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Nuevo</button></a>
    </li>
    <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12 float-right mt-2">
    	@include('compras.compras.search')
    </li>
</ol>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive"><br>
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#00bfa5">
                    <th>Fecha Compra</th>
                    <th>Número Compra</th>
                    <th>Proveedor</th>
                    <th>Documento</th>
                    <th>Comprador</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Opciones</th>
				</thead>
				@foreach ($compras as $comp)
				<tr>
					<td>{{$comp->fecha_compra}}</td>
                    <td>{{$comp->num_compra}}</td>
                    <td>{{$comp->proveedor}}</td>
                    <td>{{$comp->tipo_identificacion}}</td>
                    <td>{{$comp->nombre}}</td>
                    <td>S/{{number_format($comp->total,2)}}</td>
                    <td>
                      @if($comp->estado=="Registrado")
                        <button type="button" class="btn btn-success btn-md">
                        	<i class="fa fa-check"></i> Registrado
                        </button>
                      @else
                        <button type="button" class="btn btn-danger btn-md">
                        	<i class="fa fa-check"></i> Anulado
                        </button>
                       @endif
                    </td>
                    <td>
                        @if($comp->estado=="Registrado")
                            <button type="button" class="btn btn-danger btn-sm" data-id_compra="{{$comp->id}}" data-toggle="modal" data-target="#cambiarEstadoCompra">
                                <i class="fa fa-times"></i> Anular Compra
                            </button>
                            @else
                            <button type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-lock"></i> Anulado
                            </button>
                        @endif

                    	<a href="{{URL::action('CompraController@show',$comp->id)}}"><button class="btn btn-outline-primary border-primary"><i class="fa fa-eye">Detalles</i></button></a>

                       <a href="{{url('pdfCompra',$comp->id)}}" target="_blank">
                          <button type="button" class="btn btn-info btn-sm">
                          	<i class="fa fa-file"></i> Descargar PDF
                          </button> &nbsp;
                       </a>
                   </td>
                </tr>
                @include('compras.compras.modal')
				@endforeach
			</table>
		</div>
		{{$compras->render()}}
	</div>
</div>
@endsection
