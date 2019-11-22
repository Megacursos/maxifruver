@extends ('layouts.menu')
@section ('contenido')
    <div class="row">
    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="proveedor">Proveedor</label>
                <p>{{$compra->nombre}}</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label>Comprobante</label>
                <p>{{$compra->tipo_identificacion}}</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="num_comprobante">Número Comprobante</label>
                <p>{{$compra->num_compra}}</p>
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
                                <th>Precio Compra</th>
                                <th>Subtotal</th>
                            </thead>
                            <tfoot>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><h4 id="total">{{$compra->total}}</h4></th>
                            </tfoot>
                            <tbody>
                                @foreach($detalles as $det)
                                <tr>
                                    <td>{{$det->compra}}</td>
                                    <td>{{$det->cantidad}}</td>
                                    <td>{{$det->unidad}}</td>
                                    <td>{{$det->precio}}</td>
                                    <td>{{$det->cantidad*$det->precio}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
@endsection