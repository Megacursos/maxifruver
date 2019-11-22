<div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar Estado del Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>

        <div class="modal-body">
            {!!Form::Open(array('action'=>array('UserController@destroy',$user->id),'method'=>'delete'))!!}
			{{Form::token()}}
                <input type="hidden" id="id_usuario" name="id_usuario" value="">

                    <p>Estas seguro de cambiar el estado?</p>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-lock"></i>Aceptar</button>
                </div>

        {!!Form::close()!!}
        </div>
        <!-- /.modal-content -->
    	</div>
    <!-- /.modal-dialog -->
	</div>
</div>
@push('scripts')
<script>
     $('#cambiarEstado').on('show.bs.modal', function (event) {

        //console.log('modal abierto');

        var button = $(event.relatedTarget)
        var id_usuario = button.data('id_usuario')
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)

        modal.find('.modal-body #id_usuario').val(id_usuario);
        })
</script>
@endpush