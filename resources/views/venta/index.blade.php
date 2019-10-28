@extends('principal')

@section('css')

@endsection

@section('contenido')
    <!-- Contenido Principal -->
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">BACKEND - SISTEMA DE COMPRAS - VENTAS</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">

                <h2>Listado de Ventas</h2><br/>

                <a href="{{route('venta.create')}}">

                    <button class="btn btn-primary btn-lg" type="button">
                        <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Realizar Venta
                    </button>

                </a>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                      
                    </div>
                </div>
                
                <table id="table_id" class="table table-bordered table-striped table-sm" style="width:100%">
                    <thead>
                        <tr class="bg-primary">
                            <th>Número Factura</th>
                            <th>Fecha Venta</th>
                            <th>Cliente</th>
                            <th>Tipo de Identificación</th>
                            <th>Vendedor (Responsable)</th>
                            <th>Impuesto</th>
                            <th>Bs Total</th>
                            <th>Estado Factura</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>                    
                    <tfoot>
                        <tr>
                            <th>Número Factura</th>
                            <th>Fecha Venta</th>
                            <th>Cliente</th>
                            <th>Tipo de Identificación</th>
                            <th>Vendedor (Responsable)</th>
                            <th>Impuesto</th>
                            <th>Bs Total</th>
                            <th>Estado Factura</th>
                            <th>Acciones</th>>
                        </tr>
                    </tfoot>
                </table>

                <!-- Paginacion  -->
                
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>

    <!-- @include('compra.recursos.modal')     -->

</main>
        <!-- /Fin del contenido principal -->
@endsection

@section('js')

@endsection