<div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title">Cambiar Estado del Proveedor</h5>
		        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		    </div>
        	<div class="modal-body text-center">
			{{Form::Open(array('action'=>array('ProveedorController@destroy',$prove->id),'method'=>'delete'))}}
			<input type="hidden" id="id_producto" name="id_producto" value="">
				<p>¿Estas seguro de cambiar el estado?</p>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cerrar</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-lock"></i> Aceptar</button>
            </div>
            {{Form::Close()}}
        	</div>
        </div>
    </div>
</div>
@push('scripts')
<script>
	$('#cambiarEstado').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget)
	var id_producto = button.data('id_producto')
	var modal = $(this)
	modal.find('.modal-body #id_producto').val(id_producto);
	})
</script>
@endpush