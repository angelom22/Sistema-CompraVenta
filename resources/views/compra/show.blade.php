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
                <h2>Compra Nº{{$compra->num_compra}}</h2><br/>
                
            </div>

            <div class="card-body">
                <h2 class="text-center">Detalle de Compra</h2><br/><br/><br/>

                <div class="form-group row col-md-12">

                    <div class="col-md-3">  

                        <label class="form-control-label" for="nombre"><strong>Proveedor</strong></label>
                        <p>{{$compra->nombre_empresa}}</p>
                            
                    </div>

                    <div class="col-md-3">  

                        <label class="form-control-label" for="tipo"><strong>Tipo</strong></label>
                        <p>{{$compra->tipo_identificacion}}</p>
                    
                    </div>

                    <div class="col-md-3">

                        <label class="form-control-label" for="num_compra"><strong>Número Compra</strong></label>
                        <p>{{$compra->num_compra}}</p>

                    </div>

                    <div class="col-md-3">

                        <label class="form-control-label" for="estado"><strong>Estado</strong></label>
                        <p>{{$compra->estado}}</p>

                    </div>

                </div>


                <br/><br/>

                <div class="form-group row border">

                    <h3>Detalle de Compras</h3>
                
                    <div class="table-responsive col-md-12">

                        <table id="detalles" class="table table-bordered table-striped table-sm">

                            <thead>
                                <tr class="bg-success">

                                    <th>Producto</th>
                                    <th>Precio Bs</th>
                                    <th>Cantidad</th>
                                    <th>SubTotal Bs</th>
                                </tr>
                            </thead>
                            
                            <tfoot>
                            
                            <!--<th><h2>TOTAL</h2></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">${{$compra->total}}</h4></th>-->

                                <tr>
                                    <th  colspan="3"><p align="right">TOTAL:</p></th>
                                    <th><p align="right">Bs{{number_format($compra->total,2,",",".")}}</p></th>
                                </tr>

                                <tr>
                                    <th colspan="3"><p align="right">TOTAL IMPUESTO ({{$compra->Impuesto->nombre}}):</p></th>
                                    <th><p align="right">Bs{{number_format($compra->total*$compra->Impuesto->impuesto/100,2,",",".")}}</p></th>
                                </tr>

                                <tr>
                                    <th  colspan="3"><p align="right">TOTAL PAGAR:</p></th>
                                    <th><p align="right">Bs{{number_format($compra->total+($compra->total*$compra->Impuesto->impuesto/100),2,",",".")}}</p></th>
                                </tr> 

                                <tr class="bg-success">
                                    <th>Producto</th>
                                    <th>Precio Bs</th>
                                    <th>Cantidad</th>
                                    <th>SubTotal Bs</th>
                                </tr>

                            </tfoot>

                            <tbody>
                            
                            @foreach($detalles as $detalle)

                                <tr>

                                    <td>{{$detalle->producto}}</td>
                                    <td>Bs{{$detalle->precio}}</td>
                                    <td>{{$detalle->cantidad}}</td>
                                    <td>Bs{{number_format($detalle->cantidad*$detalle->precio,2,",",".")}}</td>

                                </tr> 
                            @endforeach
                            </tbody>
                        
                        </table>

                    </div>

                </div>
                <a href="/compra" class="btn btn-primary btn-md"> 
                    <i class="fa fa-step-backward fa-2x" aria-hidden="true"></i> 
                    Regresar
                </a>  
            </div>
            <!--fin del div card body-->
        </div>

    </div>
 
</main>
@endsection

@section('js')

@endsection