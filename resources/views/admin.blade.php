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
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/admin')}}" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contáctanos</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <img src="{{asset('imagenes/usuarios/'.Auth::user()->imagen)}}" class="img-avatar" class="img-avatar">
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
  <div class="app-body">
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
  <!-- Content Wrapper. Contains page content -->
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @foreach($totales as $total)
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>S/ {{$total->totalcompra}}</h3>
                <p>Compras (MES ACTUAL)</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('compras/compras')}}" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>S/ {{$total->totalventa}}</h3>
                <p>Ventas (MES ACTUAL)</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{url('ventas/venta')}}" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>
                <p>Usuarios Registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>
                <p>Pedidos Diarios</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Nuevos pedidos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        @endforeach
        <!-- Main row------------------------------------------------------ -->
        <div class="row">
            <div class="card col-sm-6">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie"></i>
                  Compras - Meses
                </h3>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="ct-chart">
                      <canvas id="compras"></canvas>
                   </div>
                </div>
              </div>
            </div>
        </div>

         <div class="row">
            <div class="card col-sm-6">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie"></i>
                  Ventas - Meses
                </h3>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="ct-chart">
                      <canvas id="ventas"></canvas>
                   </div>
                </div>
              </div>
            </div>
        </div>

      </div>
    </section>
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
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('js/Chart.min.js')}}"></script>
@push ('scripts')
<script>
$(function () {
    /* ChartJS
    * -------
    * Here we will create a few charts using ChartJS
    */
    //--------------
    //- AREA CHART -
    //--------------
    /**inicio de compras mes */
    var varCompra=document.getElementById('compras').getContext('2d');
        var charCompra = new Chart(varCompra, {
            type: 'line',
            data: {
                labels: [<?php foreach ($comprasmes as $reg)
                    {
                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                $mes_traducido=strftime('%B',strtotime($reg->mes));
                echo '"'. $mes_traducido.'",';} ?>],
                datasets: [{
                    label: 'Compras',
                    data: [<?php foreach ($comprasmes as $reg)
                        {echo ''. $reg->totalmes.',';} ?>],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth:3
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

        /*fin compras mes* */
    /**inicio de ventas mes */
    var varVenta=document.getElementById('ventas').getContext('2d');

        var charVenta = new Chart(varVenta, {
            type: 'bar',
            data: {
                labels: [<?php foreach ($ventasmes as $reg)
            {
                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                $mes_traducido=strftime('%B',strtotime($reg->mes));

                echo '"'. $mes_traducido.'",';} ?>],
                datasets: [{
                    label: 'Ventas',
                    data: [<?php foreach ($ventasmes as $reg)
                    {echo ''. $reg->totalmes.',';} ?>],
                    backgroundColor: 'rgba(20, 204, 20, 1)',
                    borderColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

});

/*fin ventas mes* */
</script>
@endpush
</body>
</html>