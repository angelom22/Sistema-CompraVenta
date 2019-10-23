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

                <h2>Listado de Compras</h2><br/>

                <a href="{{route('compra.create')}}">

                    <button class="btn btn-primary btn-lg" type="button">
                        <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Compra
                    </button>

                </a>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <!-- {!! Form::open(array('url'=>'compra','method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
                        <div class="input-group">
                        
                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$sql}}">
                            <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {!! Form::close() !!} -->
                    </div>
                </div>
                
                <table id="table_id" class="table table-bordered table-striped table-sm" style="width:100%">
                    <thead>
                        <tr class="bg-primary">
                            <th>Número Factura</th>
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Tipo de Identificación</th>
                            <th>Comprador (Responsable)</th>
                            <th>Impuesto</th>
                            <th>Bs Total</th>
                            <th>Estado</th>
                            <th>Factura</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compras as $compra)
                        <tr>
                        
                            <td>{{$compra->num_compra}}</td>
                            <td>{{$compra->fecha_compra}}</td>
                            <td>{{$compra->proveedor}}</td>
                            <td>{{$compra->tipo_identificacion}}</td>
                            <td>{{$compra->nombre}}</td>
                            <td>{{$compra->impuesto}}</td>
                            <td>Bs {{number_format($compra->total,2,",",".")}}</td>
                            <td>
                                @if($compra->estado == "Registrado")
                                    <a class="btn btn-primary btn-md">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        Registrada
                                    </a>
                                @else
                                    <a class="btn btn-danger btn-md">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        Anulada
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($compra->status == 3)
                                    <a class="btn btn-success btn-md">
                                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                    Pagada
                                    </a>

                                @elseif($compra->status == 4)
                                    <a class="btn btn-warning btn-md">
                                        <i class="fa fa-window-close-o" aria-hidden="true"></i>
                                    Pendiente
                                    </a>
                                @else

                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-warning" title="Ver Detalle Factura" href="{{URL::action('CompraController@show', $compra->id)}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-info" title="Descarga PDF" href="{{url('pdfCompra',$compra->id)}}" target="_blank">
                                    <i class="fa fa-file"></i> 
                                </a>
                                @if($compra->estado == "Anulada")
                                
                                @else
                                <a class="btn btn-danger"  title="Anular Compra"  data-id_compra="{{$compra->id}}" data-toggle="modal" data-target="#cambiarEstadoCompra">
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
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Tipo de Identificación</th>
                            <th>Comprador (Responsable)</th>
                            <th>Impuesto</th>
                            <th>Bs Total</th>
                            <th>Estado</th>
                            <th>Factura</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>

                <!-- Paginacion  -->
                
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>

    @include('compra.recursos.modal')    

</main>
        <!-- /Fin del contenido principal -->

@endsection

@section('js')
<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>

    <script>

    $('#table_id').dataTable( {
    "searching": true,
    "responsive": true,
    // "select": true,
    "language": {
        "decimal": ",",
        "thousands": ".",
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
    });

    </script>

    <script>    
    // INICIO DE VENTANA MODAL PARA CAMBIAR EL ESTADO DE LA COMPRA
    $('#cambiarEstadoCompra').on('show.bs.modal', function(event){
            
        // console.log('modal abierta');
        var button = $(event.relatedTarget);
        var id_compra = button.data('id_compra');
        // console.log(id_compra);
        var modal = $(this);

        // modal.find('modal-title).text('New message to ' + recipient)
        modal.find('.modal-body #id_compra').val(id_compra);
            
    });
    
    </script>
@endsection