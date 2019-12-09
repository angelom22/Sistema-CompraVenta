<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Venta;
use App\Model\DetalleVenta;
use App\Model\Cliente;
use App\Model\Producto;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            // $sql = trim($request->get('buscarTexto'));
        }
        $ventas = Venta::join('clientes', 'ventas.idcliente', '=', 'clientes.id')
                            ->join('users', 'ventas.idusuario', '=', 'users.id')
                            ->join('detalle_factura_ventas', 'ventas.id_venta', '=', 'detalle_factura_ventas.id_venta')
                            ->join('impuesto', 'ventas.impuesto', '=', 'impuesto.id')
                            ->join('estado_facturas', 'ventas.estado', '=', 'estado_facturas.id_estado_factura')
                            ->join('tipo_pago', 'ventas.tipo_pago', '=', 'tipo_pago.id_pago')
                            ->select('ventas.id_venta', 'ventas.tipo_identificacion', 'ventas.num_venta', 'ventas.fecha_venta', 'ventas.total', 'ventas.nota', 'clientes.nombre as cliente', 'users.usuario', 'impuesto.nombre as impuesto', 'estado_facturas.id_estado_factura as estado_factura', 'tipo_pago.nombre as tipo_pago')
                            // ->where('ventas.num_venta', 'LIKE', '%' .$sql. '%')
                            ->orderBy('ventas.id_venta', 'desc')
                            ->groupBy('ventas.id_venta', 'ventas.tipo_identificacion', 'ventas.num_venta', 'ventas.fecha_venta','ventas.total', 'users.usuario', 'clientes.nombre', 'impuesto.nombre', 'estado_facturas.nombre', 'tipo_pago.nombre')
                            ->get();

            // return $ventas;
            return view('venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listar los clientes en ventana modal
        $clientes = Cliente::get();
        // dd($clientes);

        // Listar los productos en Ventana modal
        $productos = DB::table('productos as producto')
                            ->join('detalle_factura_compras', 'producto.id', '=', 'detalle_factura_compras.idproducto')
                            ->select(DB::raw('CONCAT(producto.codigo," ",producto.nombre) AS producto'),'producto.id','producto.stock','producto.precio_venta')
                            ->where('producto.condicion', '=', '1')
                            ->where('producto.stock', '>', '0')
                            ->groupBy('producto', 'producto.id', 'producto.stock','producto.precio_venta')
                            ->get();
        // dd($productos);
        
        return view('venta.create', compact('clientes','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
 
            DB::beginTransaction();
            $mytime= Carbon::now('America/Caracas');

            $venta = new Venta();
            $venta->idcliente = $request->id_cliente;
            $venta->idusuario = \Auth::user()->id;
            $venta->tipo_identificacion = $request->tipo_identificacion;
            $venta->num_venta = $request->num_venta;
            $venta->fecha_venta = $mytime->toDateString();
            $venta->impuesto = "0.20";
            $venta->total=$request->total_pagar;
            $venta->estado = 'Registrado';
            $venta->save();

            $id_producto = $request->id_producto;
            $cantidad = $request->cantidad;
            $descuento = $request->descuento;
            $precio = $request->precio_venta;
           
            //Recorro todos los elementos
            $cont=0;

             while($cont < count($id_producto)){

                $detalle = new DetalleVenta();
                /*enviamos valores a las propiedades del objeto detalle*/
                /*al idcompra del objeto detalle le envio el id del objeto venta, que es el objeto que se ingresó en la tabla ventas de la bd*/
                /*el id es del registro de la venta*/
                $detalle->idventa = $venta->id;
                $detalle->idproducto = $id_producto[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio = $precio[$cont];
                $detalle->descuento = $descuento[$cont];           
                $detalle->save();
                $cont = $cont + 1;
            }
                
            DB::commit();

        } catch(Exception $e){
            
            DB::rollBack();
        }

        return Redirect::to('venta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
