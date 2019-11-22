@extends ('layouts.menu')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<a href="venta"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> Ventas </strong></button></a>
        <a href="venta/create"><button class="btn btn-success border-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Nuevo</button></a>
        <hr>
	</div>
        <div class="mt-3">
            @include('ventas.venta.search')
        </div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive"><br>
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#00bfa5">
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Comprobante</th>
					<th>Impuesto</th>
					<th>Total</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				<tbody>
               @foreach ($ventas as $ven)
				<tr>
					<td>{{ $ven->fecha_venta}}</td>
					<td>{{ $ven->nombre}}</td>
					<td>{{ $ven->tipo_identificacion.'-'.$ven->num_venta}}</td>
					<td>{{ $ven->impuesto}}</td>
					<td>S/{{number_format($ven->total,2)}}</td>
					<td>
						@if($ven->estado=="Activo")
						<button type="button" class="btn btn-outline-success border-success">
							<i class="fa fa-check-circle"></i> Activo
						</button>
						@else
						<button type="button" class="btn btn-outline-danger border-danger">
							<i class="fa fa-check"></i> Anulado
						</button>
						@endif
					</td>
					<td>
						@if($ven->estado=="Activo")
						<button type="button" class="btn btn-outline-danger border-danger" data-id_compra="{{$ven->id}}" data-toggle="modal" data-target="#cambiarEstadoVenta">
                            <i class="fa fa-times-circle"></i> Anular
                        </button>
                        @else
                        <button type="button" class="btn btn-outline-success border-success">
                        	<i class="fa fa-lock"></i> Anulado
                        </button>
                        @endif
                        <a href="{{URL::action('VentaController@show',$ven->id)}}"><button class="btn btn-outline-primary border-primary"><i class="fa fa-eye"></i>Detalles</button></a>

                    	<a href="{{url('pdfVenta',$ven->id)}}" target="_blank">
                    		<button type="button" class="btn btn-danger border-info">
                    			<i class="fa fa-file"></i><b> PDF</b>
                    		</button>
                    	</a>
                    </td>
				</tr>
				@include('ventas.venta.modal')
				@endforeach
				</tbody>
			</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>

@endsection
