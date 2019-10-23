@extends('principal')

@section('css')

    <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}"/>
 
@endsection

@section('contenido')

<!-- Contenido Principal -->
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="/">BACKEND - SISTEMA DE COMPRAS - VENTAS</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Graficas -->
        @foreach($totales as $total)

                <div class="row">

                    <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="card text-white bg-success">
                        <div class="card-body pb-0">
                            <button class="btn btn-transparent p-0 float-right" type="button">
                            <i class="fa fa-shopping-cart fa-4x"></i>
                            </button>
                            <div class="text-value h2"><strong>BsF {{$total->totalcompra}} (MES ACTUAL)</strong></div>
                            <div class="h2">Compras</div>
                        </div>
                        <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                            <a href="{{url('compra')}}" class="small-box-footer h4">Compras <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        
                    </div>
                    </div>

                    <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                            <div class="card text-white bg-warning">
                                <div class="card-body pb-0">
                                    <button class="btn btn-transparent p-0 float-right" type="button">
                                    <i class="fa fa-suitcase fa-4x"></i>
                                    </button>
                                    <div class="text-value h2"><strong>BsF xxx (MES ACTUAL) </strong></div>
                                    <div class="h2">Ventas</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                                    <a href="{{url('venta')}}" class="small-box-footer h4">Ventas <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                
                             </div>
                    </div>


                    <!-- ./col -->

                </div>

        @endforeach


                <!-- Estadísticas gráficos -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- compras - meses -->

                        <div class="card card-chart">
                            <div class="card-header">
                                <h4 class="text-center">Compras - Meses</h4>
                            </div>
                            <div class="card-content">
                                <div class="ct-chart">
                                    <canvas id="compras">                                                
                                    </canvas>
                                </div>
                            </div>
                                        
                    </div>

                    </div><!--col-md-6-->
                
                    <div class="col-md-6">
                    
                        <!-- ventas - meses -->
                        
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4 class="text-center">Ventas - Meses</h4>
                            </div>
                            <div class="card-content">
                                <div class="ct-chart">
                                    <canvas id="ventas">                                                
                                    </canvas>
                                </div>
                            </div>
                                        
                        </div>
                    
                    </div><!-- col-md-6 -->

                </div><!--row-->
        <!-- Fin de grafica -->
    </div>
    
</main>
        <!-- /Fin del contenido principal -->


@endsection

@section('js')

<script src="{{asset('js/Chart.min.js')}}"></script>

@endsection