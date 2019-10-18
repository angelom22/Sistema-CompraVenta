<!--Inicio del modal agregar-->
<div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>          
            <div class="modal-body">     
                <form action="{{route('usuario.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                
                {{csrf_field()}}
                    
                @include('user.form')

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
                <h4 class="modal-title">Actualizar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>          
            <div class="modal-body">     
                <form action="{{route('usuario.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                
                {{method_field('patch')}}
                {{csrf_field()}}

                <input type="hidden" id="id_usuario" name="id_usuario" value="">

                @include('user.form')

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
        <div class="modal-dialog modal-danger modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar Estado del Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>          
                <div class="modal-body">     
                    <form action="{{route('usuario.destroy','test')}}" method="post" class="form-horizontal">
                    
                    {{method_field('delete')}}
                    {{csrf_field()}}

                    <input type="hidden" id="id_usuario" name="id_usuario" value="">

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