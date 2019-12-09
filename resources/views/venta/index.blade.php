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
                        <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Nueva Venta
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
                        @foreach($ventas as $venta)
                        <tr>
                            <td>{{$venta->id_venta}}</td>
                            <td>{{$venta->fecha_venta}}</td>
                            <td>{{$venta->cliente}}</td>
                            <td>{{$venta->tipo_identificacion}}</td>
                            <td>{{$venta->usuario}}</td>
                            <td>{{$venta->impuesto}}</td>
                            <td>{{$venta->total}}</td>
                            <!-- <td>{{$venta->estado_factura}}</td> -->
                            <td>
                                @if($venta->estado_factura === 1)
                                    <a class="btn btn-info btn-md">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        Registrada
                                    </a>
                                @elseif($venta->estado_factura === 2)
                                    <a class="btn btn-danger btn-md">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        Anulada
                                    </a>
                                @elseif($venta->estado_factura === 3)
                                    <a class="btn btn-success btn-md">
                                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                    Pagada
                                    </a>
                                @elseif($venta->estado_factura === 4)
                                    <a class="btn btn-warning btn-md">
                                        <i class="fa fa-window-close-o" aria-hidden="true"></i>
                                    Pendiente
                                    </a>
                                @else

                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-warning" title="Ver Detalle Factura" href="#">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-info" title="Descarga PDF" href="#" target="_blank">
                                    <i class="fa fa-file"></i> 
                                </a>
                                @if($venta->estado_factura == 2)
                                
                                @else
                                <a class="btn btn-danger"  title="Anular Venta"  data-id_compra="{{$venta->id_venta}}" data-toggle="modal" data-target="#cambiarEstadoCompra">
                                    <i class="fa fa-times"></i>   
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
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
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>

                <!-- Paginacion  -->
                
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>

   

</main>
        <!-- /Fin del contenido principal -->
@endsection

@section('js')

@endsection