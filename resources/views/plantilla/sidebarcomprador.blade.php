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
                
            
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>