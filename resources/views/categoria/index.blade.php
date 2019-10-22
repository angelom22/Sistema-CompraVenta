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

                <h2>Listado de Categorías</h2><br/>
                
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Categoría
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!! Form::open(array('url'=>'categoria','method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
                        <div class="input-group">
                        <!--<select class="form-control col-md-3">
                                <option value="nombre">Categoría</option>
                                <option value="descripcion">Descripción</option>
                            </select> -->
                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$sql}}">
                            <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="bg-primary">
                            
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Cambiar Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($categorias as $categoria)

                        <tr>
                            
                            <td>{{$categoria->nombre}}</td>
                            <td>{{$categoria->descripcion}}</td>
                            <td>
                                @if($categoria->condicion == "1")

                                <button type="button" class="btn btn-success btn-md">
                            
                                    <i class="fa fa-check fa-2x"></i> Activo
                                </button>

                                @else

                                <button type="button" class="btn btn-danger btn-md">
                            
                                    <i class="fa fa-times  fa-2x"></i> Desactivado
                                </button>

                                @endif
                            </td>

                            <td>
                                <button type="button" class="btn btn-info btn-md" data-id_categoria="{{$categoria->id}}" data-nombre="{{$categoria->nombre}}" data-descripcion="{{$categoria->descripcion}}" data-toggle="modal" data-target="#abrirmodalEditar">

                                    <i class="fa fa-edit fa-2x"></i> Editar
                                </button> &nbsp;
                            </td>

                            <td>

                                @if($categoria->condicion == "1")

                                <button type="button" class="btn btn-danger btn-sm" data-id_categoria="{{$categoria->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-lock fa-2x"></i> Desactivar
                                </button>
                                
                                @else

                                <button type="button" class="btn btn-success btn-sm" data-id_categoria="{{$categoria->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-unlock-alt fa-2x"></i> Activar
                                </button>

                                @endif

                                
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginacion  -->
                {{ $categorias->render() }}
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    
    @include('categoria.recursos.modal')
    
</main>
        <!-- /Fin del contenido principal -->
@endsection

@section('js')

    <script>
        /*EDITAR CATEGORIA EN VENTANA MODAL CATEGORIAS*/
        $('#abrirmodalEditar').on('show.bs.modal', function(event){

            
        // console.log('modal abierto');

        var button = $(event.relatedTarget);
        var nombre_modal_editar = button.data('nombre');
        var descripcion_modal_editar = button.data('descripcion');
        var id_categoria = button.data('id_categoria');

        var modal = $(this);
        // modal.find('.modal-title').text('New message to' + recipient)
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
        modal.find('.modal-body #id_categoria').val(id_categoria);

        });
        /*FIN DE LA VENTANA MODAL*/

        /*INICIO VENTANA MODAL PARA CAMBIAR EL ESTADO DE LA CATEGORIA */
        $('#cambiarEstado').on('show.bs.modal', function(event){

        // console.log('modal abierto');

        var button = $(event.relatedTarget);
        var id_categoria = button.data('id_categoria');
        var modal = $(this);
        // modal.find('.modal-title').text('New message to' + recipient)

        modal.find('.modal-body #id_categoria').val(id_categoria);


        });
        /*FIN DE LA VENTANA MODAL*/
    </script>
    
        
@endsection