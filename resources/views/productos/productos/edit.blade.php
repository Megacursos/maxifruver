
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Nombre</label>
        <div class="col-md-9">
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese la nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,100}$">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="titulo">Categoría</label>
        <div class="col-md-9">
            <select class="form-control selectpicker" name="id" id="id" required data-live-search="true">
            <option value="0" disabled>Seleccione *</option>
            @foreach($categorias as $cat)
               <option value="{{$cat->id}}">{{$cat->nombre}}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="codigo">Código</label>
        <div class="col-md-9">
            <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Ingrese el Código" required pattern="[0-9]{0,15}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="stock">Stock</label>
        <div class="col-md-9">
            <input type="text" id="stock" name="stock" class="form-control" placeholder="Ingrese el stock" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Precio Venta</label>
        <div class="col-md-9">
            <input type="number" id="precio_venta" name="precio_venta" class="form-control" placeholder="Ingrese el precio venta" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Unidad</label>
        <select name="unidad" id="unidad" class="col-md-9 selectpicker" data-live-search="true">
            <option value="0">Seleccione *</option>
            <option value="Kg">Kilos</option>
            <option value="Und">Unidad</option>
            <option value="Atd">Atado</option>
            <option value="Pqt">Paquete</option>
            <option value="Cja">Caja</option>
            <option value="Bdja">Bandeja</option>
        </select>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="imagen">Imagen</label>
        <div class="col-md-9">
            <input type="file" id="imagen" name="imagen" class="form-control">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
    </div>

@push('scripts')
<script>
/*EDITAR PRODUCTO EN VENTANA MODAL*/
     $('#abrirmodalEditar').on('show.bs.modal', function (event) {

    //console.log('modal abierto');
    /*el button.data es lo que está en el button de editar*/
    var button = $(event.relatedTarget)
    /*este id_categoria_modal_editar selecciona la categoria*/
    var id_categoria_modal_editar = button.data('id_categoria')
    var nombre_modal_editar = button.data('nombre')
    var precio_venta_modal_editar = button.data('precio_venta')
    var codigo_modal_editar = button.data('codigo')
    var stock_modal_editar = button.data('stock')
    //var imagen_modal_editar = button.data('imagen1')
    var id_producto = button.data('id_producto')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    /*los # son los id que se encuentran en el formulario*/
    modal.find('.modal-body #id').val(id_categoria_modal_editar);
    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #precio_venta').val(precio_venta_modal_editar);
    modal.find('.modal-body #codigo').val(codigo_modal_editar);
    modal.find('.modal-body #stock').val(stock_modal_editar);
   // modal.find('.modal-body #subirImagen').html("<img src="img/producto/imagen_modal_editar">");
    modal.find('.modal-body #id_producto').val(id_producto);
    })

</script>
@endpush