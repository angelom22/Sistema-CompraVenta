<!--Inicio del modal agregar-->
<div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>          
                <div class="modal-body">     
                    <form action="{{route('categoria.store')}}" method="post" class="form-horizontal">
                    
                    {{csrf_field()}}
                       
                    @include('categoria.recursos.form')

                    </form>
                </div>         
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->

    <!--Inicio del modal Actualizar-->
    <div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>          
                <div class="modal-body">     
                    <form action="{{route('categoria.update', 'test')}}" method="post" class="form-horizontal">
                    
                    {{method_field('patch')}}
                    {{csrf_field()}}

                    <input type="hidden" id="id_categoria" name="id_categoria" value="">

                    @include('categoria.recursos.form')

                    </form>
                </div>         
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal Actualizar-->
    

    <!--Inicio del modal Cambiar Estado-->
    <div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar Estado de la Categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>          
                <div class="modal-body">     
                    <form action="{{route('categoria.destroy','test')}}" method="post" class="form-horizontal">
                    
                    {{method_field('delete')}}
                    {{csrf_field()}}

                    <input type="hidden" id="id_categoria" name="id_categoria" value="">

                    <p>Estas seguro de cambiar el estado ?</p>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check fa-2x"></i>Aceptar</button>
                    </div>
                    

                    </form>
                </div>         
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal Cambiar Estado-->