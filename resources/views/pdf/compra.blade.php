<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Reporte de Compra</title>
    <style>
        body{
            /* position:relative;
            width:16cm;
            height:29.7cm;
            margin:0 auto;
            color:#555555;
            background:#fff; */
            font-family:Arias, sans-serif;
            font-size:14px;

        }
        #datos{
            float:left;
            margin-top:0%;
            margin-left:2%;
            margin-right:2%;
            /* text-align:center; */
        }
        #encabezado{
            text-align:center;
            margin-left:35%;
            margin-right:35%;
            font-size:15px; 
        }
        #fact{
            /* position:relative; */
            float: right;
            margin-top:2%;
            margin-left:2%;
            margin-right:2%;
            font-size: 20px;
            background:#33AFFF;
        }
        section{
            clear:left;
        }
        #cliente{
            text-align:center;
        }
        #faproveedor{
            width:40%;
            border-collapse:collapse;
            border-spacing:0;
            margin-bottom:15px;
        }
        #fac, #fv, #fa{
            color:#FFFFFF;
            font-size:15px;
        }
        #faproveedor thead{
        padding: 20px;
        background:#33AFFF;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #faccomprador{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #faccomprador thead{
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #facproducto{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #facproducto thead{
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
    </style>
</head>
<body>
    @foreach($compra as $proveedor)
    <header>
        <!-- <div class="logo">
            <img src="img/logo.png" alt="" id="imagen">
        </div> -->
        <div>

            <table id="datos">
                <thead>
                    <tr>
                        <th id="">DATOS DEL PROVEEDOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><p id="proveedor">Nombre: {{$proveedor->nombre_empresa}}<br>
                        {{$proveedor->tipo_identificacion}}-COMPRA: {{$proveedor->num_compra}}<br>
                        Nº Documento: {{$proveedor->num_documento}}<br>
                        Responsable: {{$proveedor->responsable}}<br>
                        Direccion: {{$proveedor->direccion}}<br>
                        Teléfono: {{$proveedor->telefono}}<br>
                        Correo: {{$proveedor->email}}</p></th>
                    </tr>
                </tbody>
            </table>

        </div>

        <div id="fact">
            <p>{{$proveedor->tipo_identificacion}} COMPRA<br>
                {{$proveedor->num_compra}}</p>
        </div>

    </header>
    <br>
    @endforeach

    <br>
    <section>
        <div>

            <table id="faccomprador">
                <thead>
                    <tr id="fv">
                        <th>COMPRADOR (RESPONSABLE)</th>
                        <th>FECHA COMPA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>{{$proveedor->usuario}}</td>
                        <td>{{$proveedor->created_at}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </section>
    <br>
    <section>
        <div>

            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODCUTO</th>
                        <th>PRECIO COMPRA Bs</th>
                        <!-- <th>CANTIDAD*PRECIO</th> -->
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalles as $detalle)
                    <tr class="text-center">
                        <td>{{$detalle->cantidad}}</td>
                        <td >{{$detalle->producto}}</td>
                        <td >{{$detalle->precio}}</td>
                        <!-- <td>{{$detalle->cantidad*$detalle->precio}}</td> -->
                        <td>{{number_format($detalle->cantidad*$detalle->precio,2, ",", ".")}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    @foreach($compra as $calculo)
                    <tr>
                        <th colspan="3"><p align="right">TOTAL:</p></th>
                        <td>
                            <p align="right">Bs {{number_format($calculo->total,2, ",", ".")}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3"><p align="right">TOTAL IMPUESTO ({{$calculo->Impuesto->nombre}}):</p></th>
                        <td>
                            <p align="right">Bs {{number_format($calculo->total*$calculo->Impuesto->impuesto/100,2, ",", ".")}}</p>
                        </td>
                    </tr>
                    <!-- Falta completar el campo TOTAL a ser mostrado en el PDF -->
                    <tr>
                        <th colspan="3"><p align="right">TOTAL PAGAR:</p></th>
                        <td>
                            <p align="right">Bs {{number_format($calculo->total+($calculo->total*$calculo->Impuesto->impuesto/100),2, ",", ".")}}</p>
                        </td>
                    </tr>
                    @endforeach
                </tfoot>
            </table>

        </div>
    </section>
    <br>
    <br>

    <footer>
        <!-- colocar mensaje en esta parte -->
        <div id="datos">
            <p id="encabezado">
            <b>empresa.com</b><br>Ing. Angelo Meneses<br>Telefono:(+58)04264058729<br>Correo:angelo.jm2202@gmail.com
            </p>
        </div>
    </footer>
</body>
</html>