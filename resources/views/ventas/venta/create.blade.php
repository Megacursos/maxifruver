@extends ('layouts.menu')
@section ('contenido')
<div class="modal-body">
	<div class="modal-header">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Venta</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">
    	<div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="nombre">Cliente</label>
                <select name="id_cliente" id="id_cliente" class="form-control selectpicker" data-live-search="true">
                    @foreach($clientes as $cli)
                    <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="documento">Comprobante</label>
                <select name="tipo_identificacion"  id="tipo_identificacion" class="form-control" >
                    <option value="0">Seleccione *</option>
                    <option value="Boleta">Boleta</option>
                    <option value="Factura">Factura</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="num_venta">Número Factura</label>
                <input type="text" name="num_venta" id="num_venta" required value="{{old('num_comprobante')}}" class="form-control" pattern="[0-9]{0,15}" placeholder="Número de Comprobante...">
            </div>
        </div>
     </div>
     <div class="modal-content">
         <div class="modal-body panel-primary">
            <div class="row">
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Producto</label>
                        <select name="id_producto" class="form-control selectpicker" id="id_producto" data-live-search="true">
                            <option value="0">Seleccione</option>}
                            option
                            @foreach($productos as $prod)
                            <option value="{{$prod->id}}_{{$prod->stock}}_{{$prod->precio_venta}}">{{$prod->producto}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad" pattern="[0-9]{0,15}">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="unidad">Unidad</label>
                        <select name="unidad" id="unidad" class="form-control selectpicker" data-live-search="true">
                          <option value="0">Seleccione *</option>
                          <option value="Kg">Kilos</option>
                          <option value="Und">Unidad</option>
                          <option value="Atd">Atado</option>
                          <option value="Pqt">Paquete</option>
                          <option value="Cja">Caja</option>
                          <option value="Bdja">Bandeja</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number"  disabled name="stock" id="stock" pattern="[0-9]{0,15}" class="form-control" placeholder="Stock">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="precio_venta">Precio Venta</label>
                        <input type="number" disabled name="precio_venta" id="precio_venta" class="form-control" placeholder="P. Venta">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="impuesto">Descuento</label>
                        <input type="number" name="descuento" id="descuento" class="form-control" placeholder="Descuento">
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group mt-4 float-right">
                        <button type="button" id="agregar" class="btn btn-outline-danger border-danger"><span class="fa fa-plus"> Agregar</span></button>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color:#00bfa5">
                                <th>Opciones</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Precio Venta</th>
                                <th>Descuento</th>
                                <th>Subtotal</th>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th  colspan="5"><p align="right">Total:</p></th>
                                    <th><p id="total" align="right"><b>S/ 0.00</b></p></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th colspan="5"><p align="right">Tota Impuesto (18%):</p></th>
                                    <th><p align="right"><span id="total_impuesto">S/ 0.00</span></p></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th  colspan="5"><p align="right">Total Pagar:</p></th>
                                    <th><p align="right"><span align="right" id="total_pagar_html">S/ 0.00</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
                                </tr>
                            </tfoot>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12 mt-3 float-right">
            <div class="form-group">
                <input name="token" value="{{csrf_token()}}" type="hidden"></input>
                <button class="btn btn-primary border-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger border-danger" type="reset">Cancelar</button>
            </div>
        </div>
    	{!!Form::close()!!}
</div>
@push('scripts')
<script>

  $(document).ready(function(){

     $("#agregar").click(function(){

         agregar();
     });

  });

   var cont=0;
   total=0;
   subtotal=[];
   $("#guardar").hide();
   $("#id_producto").change(mostrarValores);

     function mostrarValores(){

         datosProducto = document.getElementById('id_producto').value.split('_');
         $("#precio_venta").val(datosProducto[2]);
         $("#stock").val(datosProducto[1]);

     }

     function agregar(){

         datosProducto = document.getElementById('id_producto').value.split('_');

         id_producto= datosProducto[0];
         producto= $("#id_producto option:selected").text();
         cantidad= $("#cantidad").val();
         unidad=$("#unidad").val();
         descuento= $("#descuento").val();
         precio_venta= $("#precio_venta").val();
         stock= $("#stock").val();
         impuesto=18;

          if(id_producto !="" && cantidad!="" && cantidad>0 && unidad!="" &&  descuento!="" && precio_venta!=""){

                if(parseInt(stock)>=parseInt(cantidad)){

                    /*subtotal[cont]=(cantidad*precio_venta)-descuento;
                    total= total+subtotal[cont];*/

                    subtotal[cont]=(cantidad*precio_venta)-(cantidad*precio_venta*descuento/100);
                    total= total+subtotal[cont];

                    var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td> <td><input type="number" name="cantidad[]" value="'+cantidad+'"> </td> <td><input type="text" name="unidad[]" value="'+unidad+'"> </td> <td><input type="number" name="precio_venta[]" value="'+parseFloat(precio_venta).toFixed(2)+'"> </td> <td><input type="number" name="descuento[]" value="'+parseFloat(descuento).toFixed(2)+'"> </td> <td>S/'+parseFloat(subtotal[cont]).toFixed(2)+'</td></tr>';
                    cont++;
                    limpiar();
                    totales();
                    /*$("#total").html("USD$ " + total.toFixed(2));
                    $("#total_venta").val(total.toFixed(2));*/
                    evaluar();
                    $('#detalles').append(fila);

                } else{

                    //alert("La cantidad a vender supera el stock");

                    Swal.fire({
                    type: 'error',
                    //title: 'Oops...',
                    text: 'La cantidad a vender supera el stock',

                    })
                }

            }else{

                //alert("Rellene todos los campos del detalle de la venta");

                Swal.fire({
                type: 'error',
                //title: 'Oops...',
                text: 'Rellene todos los campos del detalle de la venta',

                })

            }

     }


     function limpiar(){

        $("#cantidad").val("");
        $("#descuento").val("0");
        $("#unidad").val("");
        $("#precio_venta").val("");

     }

     function totales(){

        $("#total").html("S/ " + total.toFixed(2));
        //$("#total_venta").val(total.toFixed(2));

        total_impuesto=total*impuesto/100;
        total_pagar=total+total_impuesto;
        $("#total_impuesto").html("S/ " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("S/ " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
      }


     function evaluar(){

         if(total>0){

           $("#guardar").show();

         } else{

           $("#guardar").hide();
         }
     }

     function eliminar(index){

        total=total-subtotal[index];
        total_impuesto= total*18/100;
        total_pagar_html = total + total_impuesto;

        $("#total").html("S/" + total);
        $("#total_impuesto").html("S/" + total_impuesto);
        $("#total_pagar_html").html("S/" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));

        $("#fila" + index).remove();
        evaluar();
     }

 </script>

@endpush
@endsection