<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$cli->id}}">
	{{Form::Open(array('action'=>array('ClienteController@destroy',$cli->id),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title m-auto"><b>Eliminar Cliente</b></h4>
                <button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <button aria-hidden="true" class="btn btn-outline-danger border-danger"><b>×</b></button>
                </button>
			</div>
			<div class="modal-body text-center">
				<p><b>Confirme si desea Eliminar Cliente</b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-warning border-warning" data-dismiss="modal"><b>Cerrar</b></button>
				<button type="submit" class="btn btn-outline-danger border-danger"><b>Confirmar</b></button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>