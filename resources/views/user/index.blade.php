@extends('principal')

@section('css')

    <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}"/>
 
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

                <h2>Listado de Usuarios</h2><br/>
                
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Usuario
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                    @if(session()->has('info'))
                        <div class="alert alert-success">{{session('info')}}</div>          
                    @endif   
                    </div>
                </div>
                <table id="table_id" class="table table-bordered table-striped table-sm" style="width:100%">
                    <thead>
                        <tr class="bg-primary">
                            <th class="text-center"><i class="fa fa-users" aria-hidden="true"></i></th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Num</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Usuario</th>
                            <th>Roles</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{asset('storage/img/usuario/'.$user->imagen)}}" id="imagen1" alt="{{$user->nombre}}" class="img-responsive" width="100px" height="100px">
                            </td>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->TipoDocumento->letra_documento}}</td>
                            <td>{{$user->num_documento}}</td>
                            <td>{{$user->direccion}}</td>
                            <td>{{$user->telefono}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->usuario}}</td>
                            <td>    
                            <strong>{{ $user->roles()->pluck('nombre')->implode(', ') }}</strong>    
                                <!-- @foreach($user->roles as $rol)
                                   <strong>{{$rol->nombre}}</strong>,
                                @endforeach -->
                            </td>


                            <td class="text-center"> 
                                @if($user->condicion == "1")
                                    <a class="btn btn-success btn-sm" type="button" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                        <i class="fa fa-check fa-2x"></i>Activo
                                    </a>
                                @else
                                    <a class="btn btn-danger btn-sm" type="button" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#cambiarEstado" >
                                        <i class="fa fa-times fa-2x"></i> Inactivo
                                    </a>
                                @endif
                            </td>

                            <td class="text-center">
                                <a class="btn btn-info" title="Ver y Editar Usuario" data-id_usuario="{{$user->id}}" data-nombre="{{$user->nombre}}" data-tipo_documento="{{$user->TipoDocumento->id}}" data-num_documento="{{$user->num_documento}}" data-direccion="{{$user->direccion}}" data-telefono="{{$user->telefono}}" data-email="{{$user->email}}" data-usuario="{{$user->usuario}}" data-id_rol[]="{{$rol->id}}" data-imagen="{{$user->imagen}}" data-toggle="modal" data-target="#abrirmodalEditar">
                                    <i class="fa fa-eye"></i>
                                </a>                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>                    
                    <tfoot>
                        <tr>
                            <th class="text-center"><i class="fa fa-users" aria-hidden="true"></i></th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Num</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Usuario</th>
                            <th>Roles</th>
                            <th>Estado</th>
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

@include('user.recursos.modal')


@endsection

@section('js')

<script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>

<script>

$(document).ready( function () {
   
    $('#table_id').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
        [5, 15, 20, -1],
        ['5 Filas', '15 Filas', '20 Filas', 'Todas']
        ],
        buttons: [
            'pageLength',
        ],
        // buttons: [
        //     'copy', 'excel', 'pdf'
        // ],
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

    /*EDITAR USUARIO EN VENTANA MODAL*/
    $('#abrirmodalEditar').on('show.bs.modal', function(event){
        
        // console.log('modal abierta');
        // el button.data es lo que esta en el button de editar

        var button = $(event.relatedTarget);
        var nombre_modal_editar = button.data('nombre');
        var tipo_documento_modal_editar = button.data('tipo_documento');
        // console.log(tipo_documento_modal_editar);
        var num_documento_modal_editar = button.data('num_documento');
        var direccion_modal_editar = button.data('direccion');
        var telefono_modal_editar = button.data('telefono');
        var email_modal_editar = button.data('email');
        // este id_rol_modal_editar selecciona la categoria
        var id_rol_modal_editar = button.data('id_rol');
        $.isEmptyObject(id_rol_modal_editar);
        console.log(id_rol_modal_editar); 
        // var roles           = $("#id_roles").val();
        var usuario_modal_editar = button.data('usuario');
        // var password_modal_editar = button.data('password');
        var id_usuario = button.data('id_usuario');
        // console.log(id_usuario);

        var modal = $(this);
        // modal.find('.modal-title').text('New message to' + recipient)
        /** los # se los id que se encuentran en le formulario*/
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);
        modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
        modal.find('.modal-body #direccion').val(direccion_modal_editar);
        modal.find('.modal-body #telefono').val(telefono_modal_editar);
        modal.find('.modal-body #email').val(email_modal_editar);
        modal.find('.modal-body #id_rol').val(id_rol_modal_editar);
        modal.find('.modal-body #usuario').val(usuario_modal_editar);
        // modal.find('.modal-body #password').val(password_modal_editar);
        modal.find('.modal-body #id_usuario').val(id_usuario);
        
    });
    /*FIN DE LA VENTANA MODAL*/

    /* INICIO DE LA VENTA MODAL PARA CAMBIAR EL ESTADO DEL USUARIO */
    $('#cambiarEstado').on('show.bs.modal', function(event){

        // console.log('ventana modal abierta');
        var button = $(event.relatedTarget);
        var id_usuario = button.data('id_usuario');
        var modal = $(this);
        // modal.find('.modal-body-title').text('New message to' + recipient)
        modal.find('.modal-body #id_usuario').val(id_usuario);

    });
    /*FIN DE LA VENTANA MODAL*/



</script>

@endsection