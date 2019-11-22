<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Sistema de ventas | Maxi Fruver Express E.I.R.L</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
      <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
      <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
      <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
      <link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
      <title>{{ config('app.name', 'Maxi Fruver Express') }}</title>
      <script src="{{ asset('js/app.js') }}" defer></script>
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body style="background-image: url({{asset('dist/img/blog.png')}});background-size: cover;">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: rgb(0,0,0,0.9);">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Maxi Fruver Express') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{('Iniciar sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{('Registrar') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                   <i class="fa fa-sign-out-alt mr-3 text-danger"></i>{{('Salir') }}
                               </a>
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4 col-sm-6">
                    <div  class="card border-warning mt-5" style="background: rgb(0,0,0,0.7);">
                        <div class="card-header  text-center bg-warning"><b>{{('Nosotros') }}</b><h4 class="fa fa-users ml-3 text-danger"></h4></div>
                        <div class="card-body border-warning">
                            <p class="card-text text-light text-justify">Maxi Fruver Express es una empresa de última generación dedicada a la comercialización y venta al por mayor y menor de frutas y verduras, en general.<br>
                            Somos una empresa competitiva en el mercado, con el objetivo de satisfacer los más altos estándares de calidad que el cliente solicita, con una política clara de atención personalizado a cada uno de nuestros clientes, ofreciendo productos de alta calidad a precios acorde al mercado.</p>
                        </div>
                    </div>
                </div>
            <div class="col-md-4 col-sm-6">
                <div  class="card border-success mt-5"style="background: rgb(0,0,0,0.7);">
                    <div class="card-header text-center text-dark bg-success "><b>{{('Visión') }}</b><h4 class="fab fa-viadeo text-warning ml-3"></h4></div>
                    <div class="card-body">
                        <p class="card-text text-light text-justify">Ser el mayor distribuidor de frutas, verduras, a nivel nacional e internacional, contribuyendo al crecimiento sostenible de nuestros colaboradores, así como el crecimiento sostenible de nuestro país y crear cadenas de valor con nuestros clientes.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div  class="card border-primary mt-5"style="background: rgb(0,0,0,0.7);">
                    <div class="card-header text-center text-dark bg-primary"><b>{{('Misión') }}</b><h4 class="fas fa-truck-moving text-danger ml-3"></h4></div>
                    <div class="card-body">
                        <p class="card-text text-light text-justify">Ser la Empresa líder en comercialización de frutas, verduras, a nivel nacional e internacional, satisfaciendo las necesidades de nuestros clientes, brindándoles un producto de calidad y con un excelente servicio con entregas a tiempo y precios competitivos.<br>
                        Satisfacer las necesidades de nuestros clientes, brindándoles un producto de calidad y excelente servicio con entrega a tiempo y precios competitivos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
