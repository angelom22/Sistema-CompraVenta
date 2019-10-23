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

            
            <li class="nav-item">
                <a class="nav-link" href="{{ url('categoria') }}" onclick ="event.preventDefault(); document.getElementById('categoria-form').submit();">
                <i class="fa fa-list"></i> 
                    <form id="categoria-form" action="{{url('categoria')}}" method="GET" style="display:none;">
                    {{csrf_field()}}
                    </form>
                    Categorías
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{url('producto')}}" onclick ="event.preventDefault(); document.getElementById('producto-form').submit();">
                <i class="fa fa-tasks"></i>
                    <form id="producto-form" action="{{url('producto')}}" method="GET" style="display:none;">
                    {{csrf_field()}}
                    </form> 
                Productos
                </a>
            </li>
                
    
            <li class="nav-item">
                <a class="nav-link" href="{{url('compra')}}" onclick ="event.preventDefault(); document.getElementById('compras-form').submit();">
                <i class="fa fa-shopping-cart"></i>
                    <form id="compras-form" action="{{url('compra')}}" method="GET" style="display:none;">
                    {{csrf_field()}}
                    </form> 
                Compras
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('proveedor')}}" onclick ="event.preventDefault(); document.getElementById('proveedores-form').submit();">
                <i class="fa fa-users"></i> 
                    <form id="proveedores-form" action="{{url('proveedor')}}" method="GET" style="display:none;">
                    {{csrf_field()}}
                    </form>
                Proveedores
                </a>
            </li>     
            
            <li class="nav-item">
                <a class="nav-link" href="{{url('ventas')}}" onclick ="event.preventDefault(); document.getElementById('ventas-form').submit();">
                <i class="fa fa-suitcase"></i>
                    <form id="ventas-form" action="{{url('ventas')}}" method="GET" style="display:none;">
                    {{csrf_field()}}
                    </form> 
                Ventas
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('cliente')}}" onclick ="event.preventDefault(); document.getElementById('clientes-form').submit();">
                <i class="fa fa-users"></i> 
                    <form id="clientes-form" action="{{url('cliente')}}" method="GET" style="display:none;">
                    {{csrf_field()}}
                    </form>
                Clientes
                </a>
            </li>
                   
            <li class="nav-item">
                <a class="nav-link" href="{{url('usuario')}}" onclick ="event.preventDefault(); document.getElementById('usuario-form').submit();">
                <i class="fa fa-user"></i>
                    <form id="usuario-form" action="{{url('usuario')}}" method="GET" style="display:none;">
                    {{csrf_field()}}
                    </form> 
                Usuarios</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('rol')}}" onclick ="event.preventDefault(); document.getElementById('rol-form').submit();">
                <i class="fa fa-list"></i> 
                    <form id="rol-form" action="{{url('rol')}}" method="GET" style="display:none;">
                    {{csrf_field()}}
                    </form> 
                Roles
                </a>
            </li>
                
            
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>