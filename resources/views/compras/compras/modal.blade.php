
<!-- Inicio del modal cambiar estado de compra -->
<div class="modal fade" id="cambiarEstadoCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-danger" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Cambiar Estado de Compra</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				{{Form::Open(array('action'=>array('CompraController@destroy',$comp->id),'method'=>'delete'))}}
         <input type="hidden" id="id_compra" name="id_compra" value="">
         <p>Estas seguro de cambiar el estado?</p>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-lock fa-2x"></i>Aceptar</button>
          </div>

      {{Form::Close()}}
  </div>
  <!-- /.modal-content -->
 </div>
<!-- /.modal-dialog -->
</div>
<!-- Fin del modal Eliminar -->