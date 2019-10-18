@extends('principal')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}"/>
<!-- <link rel="stylesheet" type="text/css" href="{{asset('datatables/Bootstrap-4-4.1.1/css/bootstrap.min.css')}}"/> -->
 
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

                <h2>Listado de Clientes</h2><br/>
                
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Cliente
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
                            <th>Cliente </th>
                            <th>Tipo documento</th>
                            <th>Numero documento</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tfoot>
                        <tr>
                            <th>Cleinte</th>
                            <th>Tipo documento</th>
                            <th>Numero documento</th>
                            <th>Direccion</th>
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

@include('cliente.recursos.modal')


@endsection

@section('js')
<script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>

<!-- <script type="text/javascript" src="{{asset('datatables/Bootstrap-4-4.1.1/js/bootstrap.min.js')}}"></script> -->
<script>

$(document).ready( function () {
    
    $('#table_id').DataTable({
        serverSide: true,
        ajax: "{{url('api/cliente')}}",
        columns:[
            {data: 'nombre'},
            {data: 'tipo_documento'},
            {data: 'num_documento'},
            {data: 'direccion'},
            {data: 'telefono'},
            {data: 'email'},
            {data: 'btn'},
        ],
        lengthMenu: [
        [10, 25, 50, -1],
        ['10 Filas', '25 Filas', '50 Filas', 'Todas']
        ],
        buttons: [
            'copy', 'excel', 'pdf','pageLength'
        ],
        dom: 'Bfrtip',
        paging:   true,
        ordering: true,
        responsive: true,
        select: true,
        language: {
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
            },
            "oLengthMenu": {
                "sShow" : "Mostrar",
                "sRows" : "filas",
            },
        }
                
    });
    

});
</script>

<script>

     /*EDITAR CLIENTE EN VENTANA MODAL*/
     $('#abrirmodalEditar').on('show.bs.modal', function(event){
        
        console.log('modal abierta');
        // el button.data es lo que esta en el button de editar

        var button = $(event.relatedTarget);
        var nombre_modal_editar = button.data('nombre');
        var tipo_documento_modal_editar = button.data('tipo_documento');
        var num_documento_modal_editar = button.data('num_documento');
        var direccion_modal_editar = button.data('direccion');
        var telefono_modal_editar = button.data('telefono');
        var email_modal_editar = button.data('email');
        var id_cliente = button.data('id_cliente');

        var modal = $(this);
        // modal.find('.modal-title').text('New message to' + recipient)
        /** los # se los id que se encuentran en le formulario*/
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);
        modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
        modal.find('.modal-body #direccion').val(direccion_modal_editar);
        modal.find('.modal-body #telefono').val(telefono_modal_editar);
        modal.find('.modal-body #email').val(email_modal_editar);
        modal.find('.modal-body #id_cliente').val(id_cliente);
        
    });



</script>

@endsection