    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="nombre">Nombre</label>
        <div class="col-md-9">
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el Nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="direccion">Dirección</label>
        <div class="col-md-9">
            <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ingrese la dirección" pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="documento">Documento</label>
        <div class="col-md-9">
            <select class="form-control" name="tipo_documento" id="tipo_documento">
                <option value="0" disabled>Seleccione *</option>
                <option value="DNI">DNI</option>
                <option value="CEDULA">RUC</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="num_documento">Número documento</label>
        <div class="col-md-9">
            <input type="text" id="num_documento" name="num_documento" class="form-control" placeholder="Ingrese el número documento" pattern="[0-9]{0,15}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="telefono">Telefono</label>
        <div class="col-md-9">

            <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Ingrese el telefono" pattern="[0-9]{0,15}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="telefono">Correo</label>
        <div class="col-md-9">
        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el correo">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="rol">Rol</label>
        <div class="col-md-9">
            <select class="form-control" name="id_rol" id="id_rol">
            <option value="0" disabled>Seleccione *</option>
            @foreach($roles as $rol)
               <option value="{{$rol->id}}">{{$rol->nombre}}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="usuario">Usuario</label>
        <div class="col-md-9">
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingrese el usuario" pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$">
        </div>
    </div>

     <div class="form-group row">
        <label class="col-md-3 form-control-label" for="password">Password</label>
        <div class="col-md-9">
            <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese el password" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="imagen">Imagen</label>
        <div class="col-md-9">
            <input type="file" id="imagen" name="imagen" class="form-control">
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
    /*el button.data es lo que está en el button de editar*/
    var button = $(event.relatedTarget)

    var nombre_modal_editar = button.data('nombre')
    var tipo_documento_modal_editar = button.data('tipo_documento')
    var num_documento_modal_editar = button.data('num_documento')
    var direccion_modal_editar = button.data('direccion')
    var telefono_modal_editar = button.data('telefono')
    var email_modal_editar = button.data('email')
    /*este id_rol_modal_editar selecciona la categoria*/
    var id_rol_modal_editar = button.data('id_rol')
    var usuario_modal_editar = button.data('usuario')
    //var password_modal_editar = button.data('password')
    var id_usuario = button.data('id_usuario')
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    /*los # son los id que se encuentran en el formulario*/
    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);
    modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
    modal.find('.modal-body #direccion').val(direccion_modal_editar);
    modal.find('.modal-body #telefono').val(telefono_modal_editar);
    modal.find('.modal-body #email').val(email_modal_editar);
    modal.find('.modal-body #id_rol').val(id_rol_modal_editar);
    modal.find('.modal-body #usuario').val(usuario_modal_editar);
    //modal.find('.modal-body #password').val(password_modal_editar);
    modal.find('.modal-body #id_usuario').val(id_usuario);
    })
</script>
@endpush