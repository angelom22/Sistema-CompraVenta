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
        <li class="dropdown dropdown-language nav-item">
            <a id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">
                <span class="selected-language">Español</span>
                <i class="flag-icon flag-icon-es"></i>
            </a>
            <div aria-labelledby="dropdown-flag" class="dropdown-menu">
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-gb"></i> English
                </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-fr"></i> French
                </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-cn"></i> Chinese
                </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-de"></i> German
                </a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('storage/img/usuario/'.Auth::user()->imagen)}}" class="img-avatar" alt="{{Auth::user()->nombre}}">
                <span class="d-md-down-none">{{Auth::user()->usuario}} </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Cuenta</strong>
                </div>
                <a href="{{ url('usuario/'.auth()->id()) }}" class="dropdown-item"> 
                    <i class="icon-head"></i> Mi Perfil
                </a>
                <a href="#" class="dropdown-item">
                    <i class="icon-mail6"></i> Mi Correo
                </a>
                <a href="#" class="dropdown-item">
                    <i class="icon-clipboard2"></i> Tareas
                </a>
                <a href="#" class="dropdown-item">
                    <i class="icon-calendar5"></i> Calendario
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i> Cerrar sesión</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field()}}
                </form>
            </div>
        </li>
    </ul>
</header>