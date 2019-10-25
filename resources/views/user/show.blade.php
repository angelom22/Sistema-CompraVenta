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

                <h2>Usuario: {{ $user->nombre }}</h2><br/>
                
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Nombre:</th>
                        <td>{{$user->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Roles:</th>
                        <td>
                            @foreach($user->roles as $role)
                                {{$role->nombre}}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Documento:</th>
                        <td>{{$user->TipoDocumento->letra_documento}}</td>
                    </tr>
                    <tr>
                        <th>Numero:</th>
                        <td>{{$user->num_documento}}</td>
                    </tr>
                    <tr>
                        <th>Dirección:</th>
                        <td>{{$user->direccion}}</td>
                    </tr>
                    <tr>
                        <th>Teléfono:</th>
                        <td>{{$user->telefono}}</td>
                    </tr>
                    <tr>
                        <th>Correo:</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th>Nombre Usuario:</th>
                        <td>{{$user->usuario}}</td>
                    </tr>
                    <tr>
                        <th>Contraseña:</th>
                        <td>{{$user->password}}</td>
                    </tr>
                    <tr>
                        <th>Estado:</th>
                        <td>{{$user->condicion}}</td>
                    </tr>
                    <tr>
                        <th>Imagen:</th>
                        <td>{{$user->imagen}}</td>
                    </tr>
                </table>
                @can('edit', $user)
                    <a href="{{route('usuario.edit', $user->id)}}" class="btn btn-info">Editar</a>
                @endcan
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    
    
</main>
        <!-- /Fin del contenido principal -->

@endsection

@section('js')



@endsection