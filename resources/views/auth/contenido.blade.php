<!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="Sistema Ventas Laravel Vue Js- webtraining-it.com">
            <meta name="keyword" content="Sistema ventas Laravel Vue Js, Sistema compras Laravel Vue Js">
        
            <title>Proyecto</title>
            <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <!-- Icons -->
            <link href="{{asset('css/coreui-icons.min.css')}}" rel="stylesheet">
            <link href="{{asset('css/flag-icon.min.css')}}" rel="stylesheet">
            <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
            <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet">
            <!-- Main styles for this application -->
            <link href="{{asset('css/style.css')}}" rel="stylesheet">
            <link href="{{asset('css/pace.min.css')}}" rel="stylesheet">
            <!-- PNotify -->
            <link href="{{asset('vendors/pnotify/dist/PNotifyBrightTheme.css')}}" rel="stylesheet" type="text/css" />
            @yield('css')

        </head>

        <body class="app flex-row align-items-center">
            <div class="container">

                @yield('login')
            
            </div>

            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
            <!-- Bootstrap and necessary plugins -->
            <script src="{{asset('js/jquery.min.js')}}"></script>
            <script src="{{asset('js/popper.min.js')}}"></script>
            <script src="{{asset('js/bootstrap.min.js')}}"></script>
            <script src="{{asset('js/pace.min.js')}}"></script>
            <script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
            <script src="{{asset('js/coreui.min.js')}}"></script>
            <!-- Plugins and scripts required by all views -->
            <script src="{{asset('js/Chart.min.js')}}"></script>
            <!-- GenesisUI main scripts -->
            <script src="{{asset('js/template.js')}}"></script>
            <!-- PNotify -->
            <script type="text/javascript" src="{{asset('vendors/pnotify/dist/iife/PNotify.js')}}"></script>
            <script type="text/javascript" src="{{asset('vendors/pnotify/dist/iife/PNotifyButtons.js')}}"></script>

            

            @yield('js')
        </body>

    </html>