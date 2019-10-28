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
                            ->select('ventas.id_venta', 'ventas.tipo_identificacion', 'ventas.num_venta', 'ventas.fecha_venta', 'ventas.total', 'ventas.nota', 'clientes.nombre as cliente', 'users.usuario', 'impuesto.impuesto', 'estado_facturas.nombre as estado_factura', 'tipo_pago.nombre as tipo_pago')
                            // ->where('ventas.num_venta', 'LIKE', '%' .$sql. '%')
                            ->orderBy('ventas.id_venta', 'desc')
                            ->groupBy('ventas.id_venta', 'ventas.tipo_identificacion', 'ventas.num_venta', 'ventas.fecha_venta','ventas.total', 'users.usuario', 'clientes.nombre', 'impuesto.impuesto', 'estado_facturas.nombre', 'tipo_pago.nombre')
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

        // Listar los productos en Ventana modal
        $productos = Producto::join('detalle_factura_ventas', 'productos.id', '=', 'detalle_factura_ventas.idproducto')
                                ->select('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
