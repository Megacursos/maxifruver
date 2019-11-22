@extends ('layouts.menu')
@section ('contenido')
    <div class="row">
        <h4 class="text-center">Detalle de Venta</h4><br/>
    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="nombre">Cliente</label>
                <p>{{$venta->nombre}}</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="documento">Comprobante</label>
                <p>{{$venta->tipo_identificacion}}</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="num_venta">Número Venta</label>
                <p>{{$venta->num_venta}}</p>
            </div>
        </div>
     </div>
     <div class="row">
         <div class="panel panel-primary col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="panel-body">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color:#00bfa5">
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Precio Venta (S/)</th>
                                <th>Descuento</th>
                                <th>Subtotal (S/)</th>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th  colspan="4"><p align="right">Total:</p></th>
                                    <th><p align="right">${{number_format($venta->total,2)}}</p></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th colspan="4"><p align="right">Total Impuesto (18%):</p></th>
                                    <th><p align="right">${{number_format($venta->total*18/100,2)}}</p></th>
                                </tr>

                                <tr>
                                    <th></th>
                                    <th  colspan="4"><p align="right">Total Pagar:</p></th>
                                    <th><p align="right">${{number_format($venta->total+($venta->total*18/100),2)}}</p></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($detalles as $det)
                                <tr>
                                    <td>{{$det->producto}}</td>
                                    <td>{{$det->cantidad}}</td>
                                    <td>{{$det->unidad}}</td>
                                    <td>{{$det->precio}}</td>
                                    <td>{{$det->descuento}}</td>
                                    <td align="right">S/{{number_format($det->cantidad*$det->precio - $det->cantidad*$det->precio*$det->descuento/100,2)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>

@endsection