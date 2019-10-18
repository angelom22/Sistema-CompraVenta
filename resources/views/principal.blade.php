<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Compras-Ventas con Laravel y Vue Js- webtraining-it.com">
    <meta name="keyword" content="Sistema Compras-Ventas con Laravel y Vue Js">
    <title>Proyecto Compra-Venta</title>
    <!-- Icons -->
    <link href="{{asset('css/coreui-icons.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/flag-icon.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/pace.min.css')}}" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}"/>
    
    <!-- Contenido Styles Personales -->
    @yield('css')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
<header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--PONER LOGO-->
        <!--<a class="navbar-brand" href="#"></a>-->
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Dashbord</a>
            </li>
           
        </ul>
        <ul class="nav navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('storage/img/usuario/'.Auth::user()->imagen)}}" class="img-avatar" alt="{{Auth::user()->nombre}}">
                    <span class="d-md-down-none">{{Auth::user()->usuario}} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field()}}
                    </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
    <!-- Codigo para mostrar el sidebar dependiendo del rol de usuario -->
       @if(Auth::check())
            @if (Auth::user()->idrol == 1)
                @include('plantilla.sidebaradministrador')
            @elseif (Auth::user()->idrol == 2)
                @include('plantilla.sidebarvendedor')
            @elseif (Auth::user()->idrol == 3)
                @include('plantilla.sidebarcomprador')
            @elseif (Auth::user()->idrol == 4)
                @include('plantilla.sidebarsocio')
            @elseif (Auth::user()->idrol == 5)
                @include('plantilla.sidebargerente')
            @else

            @endif
       @endif

        <!-- Contenido Principal -->   
              
            @yield('contenido')
            
        <!-- /Fin del contenido principal -->
    </div>   

    <footer class="app-footer">
        <!-- <span><a href="http://www.webtraining-it.com/">Politicas de Privacidad</a> &copy; 2019</span> -->
        <span><a href="#" target="_blank">Politicas de Privacidad</a> &copy; 2019</span>
        <span class="ml-auto">Desarrollado por <a href="https://www.linkedin.com/in/angelo-meneses-9076a6159/" target="_blank">Ing. Angelo Meneses</a></span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
    <!-- <script src="{{asset('js/coreui.min.js')}}"></script> -->
    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <!-- GenesisUI main scripts -->
    <script src="{{asset('js/template.js')}}"></script>
    <!-- Libreria SweetAlert -->
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>

    <!-- Contenido JS Personales -->
    @yield('js')


</body>

</html>