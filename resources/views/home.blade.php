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
        Home
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    
</main>
        <!-- /Fin del contenido principal -->


@endsection

@section('js')


@endsection