@if(auth()->check())
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/home')}}" onclick ="event.preventDefault(); document.getElementById('home-form').submit();">
                        <i class="icon-speedometer"></i> 
                            <form id="home-form" action="{{url('/home')}}" method="GET" style="display:none;">
                            {{csrf_field()}}
                            </form>
                        Escritorio
                        </a>
                    </li>
                    <li class="nav-title">
                        Menú
                    </li>

                    

                    <!-- VISTAS DEL MENU DEL ROL ADMINISTRADOR -->

                    @if( auth()->user()->hasRoles([1]) )
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('venta')}}" onclick ="event.preventDefault(); document.getElementById('ventas-form').submit();">
                        <i class="fa fa-suitcase fa-md"></i>
                            <form id="ventas-form" action="{{url('venta')}}" method="GET" style="display:none;">
                            {{csrf_field()}}
                            </form> 
                        Ventas
                        </a>
                    </li>
                    

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-shopping-cart fa-lg"></i> Compras</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a style="font-size:13px;" class="nav-link" href="{{url('compra')}}" onclick ="event.preventDefault(); document.getElementById('compras-form').submit();">
                                <i class="fa fa-shopping-cart fa-md"></i>
                                    <form id="compras-form" action="{{url('compra')}}" method="GET" style="display:none;">
                                    {{csrf_field()}}
                                    </form> 
                                Nueva Compra
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-shopping-bag fa-lg"></i> Inventario</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a style="font-size:13px;" class="nav-link" href="{{ url('categoria') }}" onclick ="event.preventDefault(); document.getElementById('categoria-form').submit();">
                                <i class="fa fa-list fa-md"></i> 
                                    <form id="categoria-form" action="{{url('categoria')}}" method="GET" style="display:none;">
                                    {{csrf_field()}}
                                    </form>
                                    Categorías
                                </a>
                            </li>
                            <li class="nav-item">
                                <a style="font-size:13px;" class="nav-link" href="{{url('producto')}}" onclick ="event.preventDefault(); document.getElementById('producto-form').submit();">
                                <i class="fa fa-tasks fa-md"></i>
                                    <form id="producto-form" action="{{url('producto')}}" method="GET" style="display:none;">
                                    {{csrf_field()}}
                                    </form> 
                                Productos
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('proveedor')}}" onclick ="event.preventDefault(); document.getElementById('proveedores-form').submit();">
                        <i class="fa fa-users fa-md"></i> 
                            <form id="proveedores-form" action="{{url('proveedor')}}" method="GET" style="display:none;">
                            {{csrf_field()}}
                            </form>
                        Proveedores
                        </a>
                    </li>  
                       

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-users fa-lg"></i> Acreedores</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">

                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-institution fa-lg"></i> Administración</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a style="font-size:13px;" class="nav-link" href="{{url('cliente')}}" onclick ="event.preventDefault(); document.getElementById('clientes-form').submit();">
                                <i class="fa fa-male fa-md"></i> 
                                    <form id="clientes-form" action="{{url('cliente')}}" method="GET" style="display:none;">
                                    {{csrf_field()}}
                                    </form>
                                Clientes
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-users fa-lg "></i> Gestion Usuarios</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a style="font-size:13px;" class="nav-link" href="{{url('usuario')}}" onclick ="event.preventDefault(); document.getElementById('usuario-form').submit();">
                                <i class="fa fa-user fa-sm "></i>
                                    <form id="usuario-form" action="{{url('usuario')}}" method="GET" style="display:none;">
                                    {{csrf_field()}}
                                    </form> 
                                Usuarios
                                </a>                                
                            </li>
                            <li class="nav-item">
                                <a style="font-size:13px;" class="nav-link" href="{{url('rol')}}" onclick ="event.preventDefault(); document.getElementById('rol-form').submit();">
                                <i class="fa fa-list fa-sm "></i> 
                                    <form id="rol-form" action="{{url('rol')}}" method="GET" style="display:none;">
                                    {{csrf_field()}}
                                    </form> 
                                Roles
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-vcard-o fa-lg"></i> Perfil Empresa</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">

                            </li>
                        </ul>
                    </li>
                    
                    

                    <!-- VISTAS DEL MENU DEL ROL VENDEDOR -->
                    @elseif(auth()->user()->hasRoles([2]))
                        @include('plantilla.sidebarvendedor')

                    <!-- VISTAS DEL MENU DEL ROL COMPRADOR -->
                    @elseif(auth()->user()->hasRoles([3]))
                        @include('plantilla.sidebarcomprador')
                   
                    @endif
                     
                    
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>

@endif
