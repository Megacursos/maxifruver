<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de ventas | Maxi Fruver Express E.I.R.L</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap-select.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('admin')}}" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contáctanos</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <img src="{{asset('storage/img/usuario/'.Auth::user()->imagen)}}" class="img-avatar" class="img-avatar">
              <span class="d-md-down-none">{{Auth::user()->usuario}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-header text-center">
                  <strong>Cuenta</strong>
              </div>
              <a class="dropdown-item" href="{{route('logout')}}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-lock"></i> Cerrar sesión</a>

              <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
              {{ csrf_field() }}
              </form>
          </div>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-danger elevation-4">
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('dist/img/logo.png')}}"  class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MxFruver</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <img src="{{asset('storage/img/usuario/'.Auth::user()->imagen)}}" class="img-avatar" class="img-avatar">
              <span class="d-md-down-none">{{Auth::user()->usuario}}</span>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Escritorio
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lemon"></i>
              <p>
                Productos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('productos/categoria')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresar Categoría</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('productos/productos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar Productos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Compras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('compras/compras')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('compras/proveedor')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proveedores</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Ventas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('ventas/cliente')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('ventas/venta')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Usuarios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('seguridad/usuario')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios Registrados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('seguridad/roles')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de Compras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de Productos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('login')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inicio sesión</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('register')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo Cliente</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Escritorio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Escritorio</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="box-body">
      <div class="card-body">
       @if(Auth::check())
            @if (Auth::user()->idrol == 1)
                @include('plantilla.sidebaradministrador')
            @elseif (Auth::user()->idrol == 2)
                @include('plantilla.sidebarvendedor')
            @elseif (Auth::user()->idrol == 3)
                @include('plantilla.sidebarcomprador')
            @else

            @endif

        @endif
           @yield('contenido')
    </div>
  </div>
      </section>
    </div>
  </div>
  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2019-2020 <a href="#">Sistemas de ventas</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
      <b class="text-success ml-4">Nestor</b><b class="text-warning ml-2">Silva</b>
    </div>
  </footer>
</div>
<script src="{{asset('dist/jquery/jquery-3.4.1.min.js')}}"></script>
@stack('scripts')
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('dist/jquery/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/pace.min.js')}}"></script>
<script src="{{asset('js/Chart.min.js')}}"></script>
</body>
</html>