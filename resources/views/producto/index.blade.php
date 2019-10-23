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

                <h2>Listado de Productos</h2><br/>
                
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Producto
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <!-- {!! Form::open(array('url'=>'producto','method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
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
                            
                            <th>Imagen</th>
                            <th>Categoría</th>
                            <th>Producto</th>
                            <th>Código</th>
                            <th>Precio Costo</th>
                            <th>Precio Venta</th>
                            <th>Stock</th>
                            <th>Medición</th>
                            <th>Estado</th>
                            <!-- <th>Editar</th>
                            <th>Cambiar Estado</th> -->
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($productos as $producto)

                        <tr>
                            
                            <td>
                                <img src="{{asset('storage/img/producto/'.$producto->imagen)}}" id="imagen1" alt="{{$producto->nombre}}" class="img-responsive" width="100px" height="100px">
                            </td>
                            <td>{{$producto->categoria}}</td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->codigo}}</td>
                            <td>{{number_format($producto->precio_costo,2,",",".")}}</td>
                            <td>{{number_format($producto->precio_venta, 2, ",", ".")}}</td>
                            <td>{{$producto->stock}}</td>
                            <td>{{$producto->medida}}-{{$producto->letra}}</td>

                            <td>
                                @if($producto->condicion == "1")
                                    <button type="button" class="btn btn-success btn-md">
                                        <i class= "fa fa-check fa-2x"></i>
                                        Activo
                                    </button>
                                @else
                                    <button type="button" class="btn btn-danger btn-md">
                                        <i class ="fa fa-times fa-2x"></i>
                                        Desactivado
                                    </button>
                                    
                                @endif
                            </td>

                            <td class="text-center">
                                <a class="btn btn-info" title="Ver y Editar producto" data-id_producto="{{$producto->id}}" data-id_categoria="{{$producto->id_categoria}}" data-codigo="{{$producto->codigo}}" data-stock="{{$producto->stock}}" data-nombre="{{$producto->nombre}}" data-precio_venta="{{$producto->precio_venta}}" data-precio_costo="{{$producto->precio_costo}}" data-medida="{{$producto->medicion}}"  data-toggle="modal" data-target="#abrirmodalEditar">
                                    <i class="fa fa-edit"></i>
                                </a>
                                
                                @if($producto->condicion)
                                <a class="btn btn-danger" title="Desactivar Producto" data-id_producto="{{$producto->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-times"></i>
                                </a> 

                                

                                @else
                                <a class="btn btn-success" title="Activar Producto" data-id_producto="{{$producto->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-check"></i>
                                </a> 

                                <!-- <button type="button" class="btn btn-success btn-sm" data-id_producto="{{$producto->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-check fa-2x"></i>
                                    Activar
                                </button> -->

                                @endif
                            </td>
                            
                        </tr>
                        
                        @endforeach
                    </tbody>
                    <tfoot>
                        
                        
                    </tfoot>
                </table>

                <!-- Paginacion  -->
                <!-- {{ $productos->render() }} -->
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    
    @include('producto.recursos.modal')
    
</main>
        <!-- /Fin del contenido principal -->
@endsection

@section('js')
    <!-- DataTables -->
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
        
        // $('#medida').on('change', function(){
        //     var ValorSelect = $(this).val();
        //     // alert(ValorSelect);
        //     if(ValorSelect == 2){
        //         $('#div_cantidad').show();
        //     }else if(ValorSelect == 3){
        //         $('#div_cantidad').show();
        //     }else {
        //         $('#div_cantidad').hide();
        //     }
        // });

       

    });
    </script>

    <script>
        

        /*EDITAR PRODCUTO EN VENTANA MODAL*/
        $('#abrirmodalEditar').on('show.bs.modal', function(event){
            
            // console.log('modal abierta');
            /*el button.data es lo que esta en el button editar */
            var button = $(event.relatedTarget);
            /*este id_categoria_modal_editar selecciona la categoria */
            var id_categoria_modal_editar = button.data('id_categoria');
            var nombre_modal_editar = button.data('nombre');
            var precio_venta_modal_editar = button.data('precio_venta');
            var precio_costo_modal_editar = button.data('precio_costo');
            var codigo_modal_editar = button.data('codigo');
            var stock_modal_editar = button.data('stock');
            var medida_modal_editar = button.data('medida');
            // var cantidad_modal_editar = button.data('cantidad');
            // var imagen_modal_editar = button.data('imagen1');
            var id_producto = button.data('id_producto');
            
            var modal = $(this);
            //modal.find(''.modal-title).text('New message to'+ recipient)
            /*los # son los id que se encuentran en el formulario*/
            modal.find('.modal-body #id').val(id_categoria_modal_editar);
            modal.find('.modal-body #nombre').val(nombre_modal_editar);
            modal.find('.modal-body #precio_venta').val(precio_venta_modal_editar);
            modal.find('.modal-body #precio_costo').val(precio_costo_modal_editar);
            modal.find('.modal-body #codigo').val(codigo_modal_editar);
            modal.find('.modal-body #stock').val(stock_modal_editar);
            modal.find('.modal-body #medida').val(medida_modal_editar);
            // modal.find('.modal-body #cantidad').val(cantidad_modal_editar);
            // modal.find('.modal-body #subirTmagen').html("<img src="">");
            modal.find('.modal-body #id_producto').val(id_producto);
            
            
        });
        /*FIN DE LA VENTANA MODAL*/

        /* INICIO DE LA VENTA MODAL PARA CAMBIAR EL ESTADO DEL PRODUCTO */
        $('#cambiarEstado').on('show.bs.modal', function(event){

            console.log('ventana modal abierta');
            var button = $(event.relatedTarget);
            var id_producto = button.data('id_producto');
            var modal = $(this);
            // modal.find('.modal-body-title').text('New message to' + recipient)
            modal.find('.modal-body #id_producto').val(id_producto);

        });
        /*FIN DE LA VENTANA MODAL*/

    </script>

    <script>

    </script>
@endsection