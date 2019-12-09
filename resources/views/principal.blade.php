
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Compras-Ventas con Laravel y Vue Js- webtraining-it.com">
    <meta name="keyword" content="Sistema Compras-Ventas con Laravel y Vue Js">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="icon" type="image/ico" href="{{asset('img/favicon.png')}}" sizes="any">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Icons -->
    <!-- <link href="{{asset('css/coreui-icons.min.css')}}" rel="stylesheet"> -->
    <link href="{{asset('css/flag-icon.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/icomoon.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/pace.min.css')}}" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}"/>
    <!-- PNotify -->
    <link href="{{asset('vendors/pnotify/dist/PNotifyBrightTheme.css')}}" rel="stylesheet" type="text/css" />
    <!-- Select2 -->
    <link href="{{asset('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />     

       
    <!-- Contenido Styles Personales -->
    @yield('css')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

    @include('layouts.header')

    <div class="app-body">
    <!-- Codigo para mostrar el sidebar dependiendo del rol de usuario -->
       <!-- @if(Auth::check())
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
       @endif -->
       @include('layouts.menu-siderbar')

        <!-- Contenido Principal -->   
              
            @yield('contenido')
            
        <!-- /Fin del contenido principal -->
    </div>   

    @include('layouts.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
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
    <!-- PNotify -->
    <script type="text/javascript" src="{{asset('vendors/pnotify/dist/iife/PNotify.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendors/pnotify/dist/iife/PNotifyButtons.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('vendors/select2/dist/js/select2.min.js')}}"></script>
    
    
    <!-- Contenido JS Personales -->
    @yield('js')
    

</body>

</html>