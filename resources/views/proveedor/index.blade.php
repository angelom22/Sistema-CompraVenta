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

                <h2>Listado de Proveedores</h2><br/>
                
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Preveedor
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                       
                    </div>
                </div>
                
                <table id="table_id" class="table table-bordered table-striped table-sm" style="width:100%">
                    <thead>
                        <tr class="bg-primary">
                            <th>Nombre Empresa</th>
                            <th>Responsable</th>
                            <th>Tipo documento</th>
                            <th>Número documento</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($proveedores as $proveedor)
                        <tr>
                            <td>{{$proveedor->nombre_empresa}}</td>
                            <td>{{$proveedor->responsable}}</td>
                            <td>{{$proveedor->TipoDocumento->letra_documento}}</td>
                            <td>{{$proveedor->num_documento}}</td>
                            <td>{{$proveedor->direccion}}</td>
                            <td>{{$proveedor->telefono}}</td>
                            <td>{{$proveedor->email}}</td>
                            <td class="text-center">
                                <a class="btn btn-info" title="Ver y Editar Proveedor" data-id_proveedor="{{$proveedor->id}}" data-nombre_empresa="{{$proveedor->nombre_empresa}}" data-responsable="{{$proveedor->responsable}}" data-tipo_documento="{{$proveedor->TipoDocumento->id}}" data-num_documento="{{$proveedor->num_documento}}" data-direccion="{{$proveedor->direccion}}" data-telefono="{{$proveedor->telefono}}" data-email="{{$proveedor->email}}" data-toggle="modal" data-target="#abrirmodalEditar">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                                <a class="btn btn-warning" title="Cargar Factura Proveedor" >
                                    <i class="fa fa-wpforms"></i>
                                </a>                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>                    
                    <tfoot>
                        <tr>
                            <th>Nombre Empresa</th>
                            <th>Responsable</th>
                            <th>Tipo documento</th>
                            <th>Número documento</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Correo</th>
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

@include('proveedor.recursos.modal')


@endsection

@section('js')
<!-- DataTables -->
<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>

    <script>

    $(document).ready( function () {
        
        $('#table_id').DataTable({
            
            bProcessing: true,
            bStateSave: true,
            dom: 'Bfrtip',
            lengthMenu: [
            [5, 15, 20, -1],
            ['5 Filas', '15 Filas', '20 Filas', 'Todas']
            ],
            buttons: [
                'copy', 'excel', 'pdf','pageLength',
            ],
            paging:   true,
            ordering: true,
            info:     true,
            scrollY: 400,
            // scrollX: true,
            responsive: true,
            // autoFill: true,
            // select: true,
            language: {
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
        

    });
    </script>

    <script>

        /*EDITAR PROVEEDOR EN VENTANA MODAL*/
        $('#abrirmodalEditar').on('show.bs.modal', function(event){
            
            // console.log('modal abierta');
            // el button.data es lo que esta en el button de editar

            var button = $(event.relatedTarget);
            var nombre_empresa_modal_editar = button.data('nombre_empresa');
            var responsable_modal_editar = button.data('responsable');
            var tipo_documento_modal_editar = button.data('tipo_documento');
            // console.log(tipo_documento_modal_editar);
            var num_documento_modal_editar = button.data('num_documento');
            var direccion_modal_editar = button.data('direccion');
            var telefono_modal_editar = button.data('telefono');
            var email_modal_editar = button.data('email');
            var id_proveedor = button.data('id_proveedor');

            var modal = $(this);
            // modal.find('.modal-title').text('New message to' + recipient)
            /** los # se los id que se encuentran en le formulario*/
            modal.find('.modal-body #nombre_empresa').val(nombre_empresa_modal_editar);
            modal.find('.modal-body #responsable').val(responsable_modal_editar);
            modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);
            modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
            modal.find('.modal-body #direccion').val(direccion_modal_editar);
            modal.find('.modal-body #telefono').val(telefono_modal_editar);
            modal.find('.modal-body #email').val(email_modal_editar);
            modal.find('.modal-body #id_proveedor').val(id_proveedor);
            
        });



    </script>

@endsection