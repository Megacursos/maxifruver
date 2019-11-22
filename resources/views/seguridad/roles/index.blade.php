@extends('layouts.menu')
@section('contenido')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">BACKEND - SISTEMA DE COMPRAS - VENTAS</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header text-center">
               <h3>Roles</h3><br/>
            </div>
            <div class="card-body text-center">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="bg-primary">
                            <th class="text-center">Rol</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($roles as $rol)
                        <tr>
                            <td>{{$rol->nombre}}</td>
                            <td>{{$rol->descripcion}}</td>
                            <td>
                              @if($rol->condicion=="1")
                                <button type="button" class="btn btn-success">
                                  <i class="fa fa-check-circle"></i> Activo
                                </button>
                              @else
                                 <button type="button" class="btn btn-danger btn-md">
                                 <i class="fa fa-times-circle"></i> Desactivado
                                 </button>
                              @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{$roles->render()}}
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
@endsection