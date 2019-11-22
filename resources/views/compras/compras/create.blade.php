@extends ('layouts.menu')
@section ('contenido')
<div class="modal-content">
    <div class="modal-body">

    <div class="modal-header">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<a href="{{asset('compras/compras')}}"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> compras </strong></button></a>
			@if (count   ($errors)>0)
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
			{!!Form::open(array('url'=>'compras/compras','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">
    	<div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="proveedor">Proveedor</label>
                <select name="idproveedor" name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true">
                    <option value="0">Seleccione *</option>
                    @foreach($proveedores as $pro)
                    <option value="{{$pro->id}}">{{$pro->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label>Tipo Comprobante</label>
                <select name="tipo_identificacion" id="tipo_identificacion" class="form-control" >
                    <option value="0">Seleccione *</option>
                    <option value="Boleta">Boleta</option>
                    <option value="Factura">Factura</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="num_compra">Número Documento</label>
                <input type="number" id="num_compra" name="num_compra" required pattern="[0-9]{0,15}" value="{{old('num_comprobante')}}" class="form-control" placeholder="Número de Comprobante...">
            </div>
        </div>
    </div>
     <div class="modal-content">
         <div class="modal-body panel-primary">
            <div class="row">
                <div class="col-lg-3 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label>Producto</label>
                        <select name="id_producto" id="id_producto" class="form-control selectpicker" data-live-search="true">
                            <option value="0">Seleccione *</option>
                            @foreach($productos as $prod)
                            <option value="{{$prod->id}}">{{$prod->producto}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number"id="cantidad" name="cantidad" class="form-control" placeholder="Cantidad">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="precio_compra">Precio Compra</label>
                        <input type="number" id="precio_compra" name="precio_compra" class="form-control" placeholder="P. Compra">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label>Unidad</label>
                        <select type="text" name="punidad" id="punidad" class="form-control selectpicker" data-live-search="true">
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
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
                    <div class="form-group float-right">
                        <button type="button" id="agregar" class="btn btn-outline-danger border-danger"><span class="fa fa-plus">Agregar</span></button>
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
                                <th>Precio (S/)</th>
                                <th>Subtotal</th>
                            </thead>
                            <tfoot class="text-center">
                                <tr>
                                    <th></th>
                                    <th  colspan="4"><p align="right">Total:</p></th>
                                    <th><p align="right"><span id="total">S/ 0.00</span> </p></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th colspan="4"><p align="right">Total impuesto (18%):</p></th>
                                    <th><p align="right"><span id="total_impuesto">S/ 0.00</span></p></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th  colspan="4"><p align="right">Total Pagar:</p></th>
                                    <th><p align="right"><span align="right" id="total_pagar_html">S/ 0.00</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
                                </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        <div class="col-lg-12 col-sm-12 col-md-6 col-xs-12" id="guardar">
            <div class="form-group float-right">
                <input name="token" value="{{csrf_token()}}" type="hidden"></input>
                <button class="btn btn-primary border-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger border-danger" type="reset">Cancelar</button>
            </div>
        </div>
    </div>
    </div>
    	{!!Form::close()!!}
    </div>
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

     function agregar(){

          id_producto= $("#id_producto").val();
          producto= $("#id_producto option:selected").text();
          unidad= $("#punidad").val();
          cantidad= $("#cantidad").val();
          precio_compra= $("#precio_compra").val();
          impuesto=18;


          if(id_producto !="" && cantidad!="" && cantidad>0 && unidad!="" &&precio_compra!=""){

             subtotal[cont]=cantidad*precio_compra;
             total= total+subtotal[cont];

             var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td>  <td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="text" name="punidad[]" value="'+unidad+'"> </td> <td><input type="number" id="precio_compra[]" name="precio_compra[]"  value="'+precio_compra+'"> </td><td>S/ '+subtotal[cont]+' </td></tr>';
             cont++;
             limpiar();
             totales();

             evaluar();
             $('#detalles').append(fila);

            }else{

               // alert("Rellene todos los campos del detalle de la compra, revise los datos del producto");

                Swal.fire({
                type: 'error',
                //title: 'Oops...',
                text: 'Rellene todos los campos del detalle de la compras',
                })
            }
     }
     function limpiar(){
        $("#cantidad").val("");
        $("#precio_compra").val("");
     }

     function totales(){

        $("#total").html("S/ " + total.toFixed(2));

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