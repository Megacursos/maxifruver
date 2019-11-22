@extends ('layouts.menu')
@section ('contenido')
<div class="modal-content">
    <div class="modal-body">
    <div class="row">
        <div class="modal-header col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a href="{{asset('productos/productos')}}"><button class="btn border-danger"><i class="box-title fa fa-desktop mr-2 text-danger"></i><strong> Productos </strong></button></a>
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
            {!!Form::open(array('url'=>'productos/productos','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese la nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,100}$" value="{{old('nombre')}}">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Categoria</label>
                        <select name="id" id="id" class="form-control selectpicker" data-live-search="true">
                            <option value="0">Seleccione *</option>
                            @foreach ($categorias as $cat)
                            <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text" id="codigo" name="codigo" required value="{{old('codigo')}}" class="form-control" pattern="[0-9]{0,15}" placeholder="Código de productos...">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" id="stock" name="stock" required value="{{old('stock')}}" class="form-control" placeholder="Stock de productos...">
                    </div>
                </div>
                 <div class="col-lg-4 col-sm-4 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="precio_venta">Precio Venta</label>
                        <input type="text" id="precio_venta" name="precio_venta" required value="{{old('precio_venta')}}" class="form-control" placeholder="Ingrese precio de venta...">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Unidad</label>
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
                <div class="col-lg-4 col-sm-4 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" id="imagen" name="imagen" required >
                    </div>
                </div>
            </div>

            <div class="modal-footer col-lg-12 col-sm-12 col-md-12 col-xs-12 float-right">
                <button class="btn btn-primary border-primary" type="submit">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>

            {!!Form::close()!!}
        </div>
    </div>
@endsection