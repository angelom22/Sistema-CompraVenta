@extends('principal')

@section('css')

@endsection

@section('contenido')

<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">BACKEND - SISTEMA DE COMPRAS - VENTAS</a></li>
    </ol>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Factura Nº xxx</h2><br/>
                <span style="color:red;">(*)<strong> Campo obligatorio</strong></span><br/>
            </div>

            <div class="card-body">
                
                <h3 class="text-center">Datos Venta</h3>

                    <form action="{{route('venta.store')}}" method="POST">
                    {{csrf_field()}}

                            <div class="form-group row">

                                <div class="col-md-3">  

                                    <label class="form-control-label" for="nombre">Tipo Cliente <span style="color:red;">(*)</span></label>
                                    
                                    <select class="form-control selectpicker" name="id_cliente" id="id_cliente" data-live-search="true">
                                                                    
                                    <option value="0" disabled>Seleccione</option>
                                    
                                    @foreach($clientes as $cliente)
                                    
                                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                            
                                    @endforeach

                                    </select>
                                
                                </div>

                                <div class="col-md-3"> 
                                    <label class="form-control-label" for="documento">Documento <span style="color:red;">(*)</span></label>
                                    <select class="form-control" name="tipo_identificacion" id="tipo_identificacion" required>                                 
                                        <option value="0" disabled>Seleccione</option>
                                        <option value="FACTURA">Factura</option>
                                        <option value="TICKET">Ticket</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-control-label" for="num_venta">Número Venta <span style="color:red;">(*)</span></label>
                                        
                                    <input type="text" id="num_venta" name="num_venta" class="form-control" placeholder="Ingrese el número compra" required pattern="[0-9]{0,15}">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-control-label" for="nota">Nota </label>
                                        
                                    <input type="text" id="nota" name="nota" class="form-control" placeholder="Ingrese la nota">
                                </div>

                            </div>

                            <!-- <div class="form-group row">
                                
                            </div> -->

                            <hr>
                            <div class="form-group row" >

                                <div class="col-md-6">
                                    <label class="form-control-label" for="tipo_pago"> Forma de Pago<span style="color:red;">(*)</span></label>
                                    <select class="form-control" name="tipo_pago" id="tipo_pago" required>                     
                                        <option value="0" disabled>Seleccione</option>
                                        <option value="1">Punto</option>
                                        <option value="2">Efectivo</option>
                                        <option value="3">Transferenia</option>
                                        <option value="4">Punto+Efectivo</option>
                                        <option value="5">Dolar$</option>
                                        <option value="6">Punto+$</option>
                                        <option value="7">Efectivo+$</option>
                                        <option value="8">Otra Moneda</option>
                                        <option value="9">Nota de Credito</option>
                                        <option value="10">CriptoMoneda</option>
                                    </select>
                                </div>         

                            </div>

                            <div class="form-group row" id="div_pago1">

                                <div class="col-md-4">
                                    <label class="form-control-label" for="punto"> Punto<span style="color:red;"></span></label>
                                    <input type="text" id="punto" name="punto" class="form-control currency"  pattern="[0-9/.]{0,15}" >
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-control-label" for="efectivo"> Efectivo<span style="color:red;"></span></label>
                                    <input type="text" id="efectivo" name="efectivo" class="form-control currency"  pattern="[0-9/.]{0,15}" disabled="">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-control-label" for="moneda_extranjera"> Dolar $<span style="color:red;"></span></label>
                                    <input type="text" id="moneda_extranjera" name="moneda_extranjera" class="form-control currency"  pattern="[0-9/.]{0,15}" disabled="">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-control-label" for="tranferencia"> Transferencia<span style="color:red;"></span></label>
                                    <input type="text" id="tranferencia" name="tranferencia" class="form-control currency"  pattern="[0-9/.]{0,15}" disabled="">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-control-label" for="detalle"> Nº Transferencia<span style="color:red;"></span></label>
                                    <input type="text" id="detalle" name="detalle" class="form-control"  pattern="[0-9]{0,15}" disabled="">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-control-label" for="estado_factura"> Status<span style="color:red;"></span></label>
                                    <select class="form-control" name="estado_factura" id="estado_factura">
                                        <option value="0" disabled>Seleccione</option>
                                        <option value="">Pagada</option>
                                        <option value="">Pendiente</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group row" id="div_pago2">
                                campo para las otras formas de pago
                            </div>
                            <hr>

                            <br/>

                            <h4 class="text-center">Detalles Venta</h4>
                            <div class="form-group row ">

                                <div class="col-md-6">  

                                    <label class="form-control-label" for="id_producto">Productos <span style="color:red;">(*)</span></label>

                                    <select class="form-control selectpicker" name="id_producto" id="id_producto" data-live-search="true">
                                                                    
                                        <option value="0" disabled>Seleccione</option>
                                        
                                        @foreach($productos as $producto)
                                        
                                        <option value="{{$producto->id}}_{{$producto->stock}}_{{$producto->precio_venta}}">{{$producto->producto}}</option>
                                                
                                        @endforeach

                                    </select>
                                </div>
                                <br/>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-2">
                                    <label class="form-control-label" for="cantidad">Cantidad <span style="color:red;">(*)</span></label>
                                    
                                    <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad" pattern="[0-9]{0,15}">
                                </div>

                                <div class="col-md-2">
                                    <label class="form-control-label" for="stock">Stock <span style="color:red;">(*)</span></label>
                                    
                                    <input type="number" disabled id="stock" name="stock" class="form-control" placeholder="Cantidad Stock"  pattern="[0-9]{0,15}">
                                </div>

                                <div class="col-md-2">
                                    <label class="form-control-label" for="precio_venta">Precio Venta <span style="color:red;">(*)</span></label>
                                    
                                    <input type="text" disabled id="precio_venta" name="precio_venta" class="form-control currency" pattern="[0-9]{0,15}">
                                </div>

                                <div class="col-md-2">
                                    <label class="form-control-label" for="descuento">Descuento <span style="color:red;">(*)</span></label>
                                    
                                    <input type="text" id="descuento" name="descuento" class="form-control currency" value="0" pattern="[0-9/.]{0,15}">
                                </div>

                                <!-- input para el impuesto -->
                     
                            

                                <div class="col-md-3">     
                                    <button type="button" id="agregar" class="btn btn-primary"><i class="fa fa-plus fa-2x"></i> Agregar detalle</button>
                                </div>


                            </div>

                            <br/><br/>

                        <div class="form-group row border">

                        <h3>Lista de Ventas a Clientes</h3>

                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr class="bg-success">
                                        <th>Eliminar</th>
                                        <th>Producto</th>
                                        <th>Precio Venta Bs</th>
                                        <th>Descuento</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal Bs</th>
                                    </tr>
                                </thead>
                                
                                <tfoot>

                                    <tr>
                                        <th  colspan="5"><p align="right">TOTAL:</p></th>
                                        <th><p align="right"><span id="total">Bs 0.00</span> </p></th>
                                    </tr>

                                    <tr>
                                        <th colspan="5"><p align="right">TOTAL IMPUESTO (20%):</p></th>
                                        <th><p align="right"><span id="total_impuesto">Bs 0.00</span></p></th>
                                    </tr>

                                    <tr>
                                        <th  colspan="5"><p align="right">TOTAL PAGAR:</p></th>
                                        <th><p align="right"><span align="right" id="total_pagar_html">Bs 0.00</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
                                    </tr>  

                                </tfoot>

                                <tbody>
                                </tbody>
                            
                            
                            </table>
                        </div>
                            
                            </div>

                            <div class="modal-footer form-group row" id="guardar">
                            
                                <div class="col-md">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <a href="/venta" class="btn btn-primary btn-md"> 
                                        <i class="fa fa-step-backward fa-2x" aria-hidden="true"></i> 
                                        Regresar
                                    </a>         
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Registrar</button>
                                </div>

                            </div>

                    </form>
                    
                </div>
                <!--fin del div card body-->
        </div>

    </div>
 
</main>

@endsection

@section('js')
<script src="{{asset('js/venta.js')}}"></script>
<!-- inputs currency 0.00-->
<script src="{{{asset('js/jquery.inputmask.bundle.min.js')}}}"></script>
<script>
    $(".currency").inputmask('currency',{rightAlign: true, 'groupSeparator': '', 'autoGroup': true  });
</script>   
   
@endsection