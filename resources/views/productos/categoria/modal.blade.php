<div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-primary modal-md" role="document">
	    <div class="modal-content">
	        <div class="modal-header bg-warning">
	            <h5 class="modal-title m-auto">Cambiar Estado de la Categoría</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">×</span>
	            </button>
	        </div>
	        <div class="modal-body">
			{{Form::Open(array('action'=>array('CategoriaController@destroy',$cat->id),'method'=>'delete'))}}
			<input type="hidden" id="id_categoria" name="id_categoria" value="">
		        <b><p class="text-center text-danger">¿Estas seguro de cambiar el estado?</p></b>
		        <div class="modal-footer">
		            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
		            <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i> Aceptar</button>
		        </div>
			{{Form::Close()}}
			</div>
		</div>
	</div>
</div>
@push('scripts')
<script>
    $('#cambiarEstado').on('show.bs.modal', function (event) {
    //console.log('modal abierto');
    var button = $(event.relatedTarget)
    var id_categoria = button.data('id_categoria')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body #id_categoria').val(id_categoria);
    })
</script>
@endpush