    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Categoría</label>
        <div class="col-md-9">
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de categoría" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">

        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Descripción</label>
        <div class="col-md-9">
        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese descripcion">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
    </div>
@push('scripts')
<script>
    $('#abrirmodalEditar').on('show.bs.modal', function (event) {
    //console.log('modal abierto');
    var button = $(event.relatedTarget)
    var nombre_modal_editar = button.data('nombre')
    var descripcion_modal_editar = button.data('descripcion')
    var id_categoria = button.data('id_categoria')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
    modal.find('.modal-body #id_categoria').val(id_categoria);
    })
</script>
@endpush