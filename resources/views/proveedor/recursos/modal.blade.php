<!--Inicio del modal agregar-->
<div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>          
            <div class="modal-body">     
                <form action="{{route('proveedor.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                
                {{csrf_field()}}
                    
                @include('proveedor.recursos.form')

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
                <h4 class="modal-title">Actualizar Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>          
            <div class="modal-body">     
                <form action="{{route('proveedor.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                
                {{method_field('patch')}}
                {{csrf_field()}}

                <input type="hidden" id="id_proveedor" name="id_proveedor" value="">
                


                @include('proveedor.recursos.form')

                </form>
            </div>         
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal Actualizar-->