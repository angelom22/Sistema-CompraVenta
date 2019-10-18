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
                <h2>Listado de Roles</h2><br/>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <table id="table_id" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="bg-primary">
                            
                            <th>Rol</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($roles as $rol)

                        <tr>
                            
                            <td>{{$rol->nombre}}</td>
                            <td>{{$rol->descripcion}}</td>
                            <td>
                                @if($rol->condicion == "1")

                                <button type="button" class="btn btn-success btn-md">
                            
                                    <i class="fa fa-check fa-2x"></i> Activo
                                </button>

                                @else

                                <button type="button" class="btn btn-danger btn-md">
                            
                                    <i class="fa fa-times  fa-2x"></i> Desactivado
                                </button>

                                @endif
                            </td>

                            
                        </tr>
                        
                        @endforeach
                    </tbody>
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

<script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
<script>

$(document).ready( function () {
    
    $('#table_id').DataTable({
        responsive: true,
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

@endsection