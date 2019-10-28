<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Model\Compra;
use App\Model\DetalleCompra;
use App\Model\Proveedor;
use App\Model\Producto;
use App\Model\Impuesto;
use Illuminate\Support\Facades\Redirect;

class CompraController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $detallecompra = DetalleCompra::all();
        // dd($detallecompra[0]->estadoFactura->nombre);

        if($request){
            $sql = trim($request->get('buscarTexto'));
            $compras = Compra::join('proveedores', 'compras.idproveedor', '=', 'proveedores.id')
                        ->join('users', 'compras.idusuario', '=', 'users.id')
                        ->join('detalle_factura_compras', 'compras.id', '=', 'detalle_factura_compras.idcompra')
                        ->join('impuesto', 'compras.impuesto', '=', 'impuesto.id')
                        ->select('compras.id', 'compras.tipo_identificacion', 'compras.num_compra','compras.fecha_compra','compras.impuesto', 'compras.total', 'compras.estado', 'proveedores.nombre_empresa as proveedor', 'detalle_factura_compras.status', 'users.nombre')
                        ->where('compras.num_compra', 'LIKE', '%'.$sql.'%')
                        ->orwhere('compras.estado', 'LIKE', '%'.$sql.'%')
                        ->orderBy('compras.id', 'desc')
                        ->groupBy('compras.id', 'compras.tipo_identificacion', 'compras.num_compra','compras.fecha_compra','compras.impuesto','compras.total', 'compras.estado', 'proveedores.nombre_empresa', 'detalle_factura_compras.status','users.nombre')
                        ->get();
            // dd($compras[0]->Impuesto->nombre);
            return view('compra.index', compact('compras','sql'));
            // return $compras;
        }

        // return $compras;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // METODO PARA CREAR COMPRAS

        // listar los proveedores en ventana modal
        $proveedores = Proveedor::get();

        // Listar los impuestos en la ventana modal
        $impuesto = Impuesto::get();

        // listar los productos en ventana modal
        $productos = DB::table('productos as prod')
                    ->select(DB::raw('CONCAT(prod.codigo," ",prod.nombre) AS producto'), 'prod.id')
                    ->where('prod.condicion', '=', '1')
                    ->get();
        
        return view('compra.create',compact('proveedores','productos','impuesto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // METODO PARA EL REGISTRO Y DETALLE DE LAS COMPRAS

        // dd($request->all());
        try{

            DB::beginTransaction();

            $mytime = Carbon::now('America/Caracas');

            $compra = new Compra();
            $compra->idproveedor            = $request->id_proveedor;
            $compra->idusuario              = \Auth::user()->id;
            $compra->tipo_identificacion    = $request->tipo_identificacion;
            $compra->num_compra             = $request->num_compra;
            $compra->fecha_compra           = $mytime->toDateString();
            $compra->impuesto               = $request->impuesto;
            $compra->total                  = $request->total_pagar;
            $compra->estado                 = 'Registrado';
            $compra->save();

            // variabes del detalle de la compra
            $id_producto    = $request->id_producto;
            $cantidad       = $request->cantidad;
            $precio         = $request->precio_compra;

            //Recorro todos los elementos
            $cont=0;
     
            while($cont < count($id_producto)){

               $detalle = new DetalleCompra();
               /*enviamos valores a las propiedades del objeto detalle*/
               /*al idcompra del objeto detalle le envio el id del objeto compra, que es el objeto que se ingresó en la tabla compras de la bd*/
               $detalle->idcompra = $compra->id;
               $detalle->idproducto = $id_producto[$cont];
               $detalle->cantidad = $cantidad[$cont];
               $detalle->precio = $precio[$cont];    
               $detalle->save();
               $cont=$cont+1;
            }

            DB::commit();

        } catch(Exception $e){

            DB::rollBack();

        }

        return Redirect::to('compra');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);

        // Mostrar vista del detalle de la compra

        // $id = $request->id;

        // mostrar compra
        $compra = Compra::join('proveedores', 'compras.idproveedor', '=', 'proveedores.id')
                            ->join('detalle_factura_compras', 'compras.id', '=', 'detalle_factura_compras.idcompra')
                            ->join('impuesto', 'compras.impuesto', '=', 'impuesto.id')
                            ->select('compras.id', 'compras.tipo_identificacion', 'compras.num_compra', 'compras.fecha_compra', 'compras.impuesto', 'compras.total', 'compras.estado',
                            DB::raw('sum(detalle_factura_compras.cantidad*precio) as total'), 'proveedores.nombre_empresa')
                            ->where('compras.id', '=', $id)
                            ->orderBy('compras.id', 'desc')
                            ->groupBy('compras.id', 'compras.tipo_identificacion', 'compras.num_compra', 'compras.fecha_compra', 'compras.impuesto', 'compras.total', 'compras.estado', 'proveedores.nombre_empresa')
                            ->first();
        // dd($compra->Impuesto->impuesto);
        
        // mostrar detalle
        $detalles = DetalleCompra::join('productos', 'detalle_factura_compras.idproducto', '=', 'productos.id')
                                    ->select('detalle_factura_compras.cantidad', 'detalle_factura_compras.precio', 'productos.nombre as producto')
                                    ->where('detalle_factura_compras.idcompra', '=', $id)
                                    ->orderBy('detalle_factura_compras.id', 'desc')
                                    ->get();
        

        return view('compra.show',compact('compra','detalles'));
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
    public function destroy(Request $request)
    {
        // ESTE METODO ME PERMITE ANULAR UNA COMPRA
        $compra = Compra::findOrFail($request->id_compra);
        // dd($request->id_compra);
        $compra->estado = 'Anulada';
        $compra->save();

        return Redirect::to('compra');
    }

    public function pdf(Request $request, $id){

        $compra = Compra::join('proveedores', 'compras.idproveedor', '=', 'proveedores.id')
                            ->join('users', 'compras.idusuario', '=', 'users.id')
                            ->join('detalle_factura_compras', 'compras.id', '=', 'detalle_factura_compras.idcompra')
                            ->join('impuesto', 'compras.impuesto', '=', 'impuesto.id')
                            ->select('compras.id', 'compras.tipo_identificacion', 'compras.num_compra', 'compras.created_at', 'compras.impuesto', DB::raw('sum(detalle_factura_compras.cantidad*precio) as total'), 'compras.estado', 'proveedores.nombre_empresa', 'proveedores.responsable', 'proveedores.tipo_documento', 'proveedores.num_documento', 'proveedores.direccion', 'proveedores.telefono', 'proveedores.email', 'users.usuario')
                            ->where('compras.id', '=', $id)
                            ->orderBy('compras.id', 'desc')
                            ->groupBy('compras.id', 'compras.tipo_identificacion', 'compras.num_compra', 'compras.created_at', 'compras.impuesto', 'compras.estado', 'proveedores.nombre_empresa', 'proveedores.responsable', 'proveedores.tipo_documento', 'proveedores.num_documento', 'proveedores.direccion', 'proveedores.telefono', 'proveedores.email', 'users.usuario')
                            ->take(1)
                            ->get();
        // dd($compra[0]->Impuesto->impuesto);

        $detalles = DetalleCompra::join('productos', 'detalle_factura_compras.idproducto', '=', 'productos.id')
                                    ->select('detalle_factura_compras.cantidad', 'detalle_factura_compras.precio', 'productos.nombre as producto')
                                    ->where('detalle_factura_compras.idcompra', '=', $id)
                                    ->orderBy('detalle_factura_compras.id', 'desc')
                                    ->get();

        $numcompra = Compra::join('proveedores', 'compras.idproveedor', '=', 'proveedores.id')
                                ->select('compras.num_compra','proveedores.nombre_empresa as proveedor')
                                ->where('compras.id', $id)
                                ->get();

        $pdf = \PDF::loadView('pdf.compra',compact('compra', 'detalles'));

        return $pdf->download('compra-'.$numcompra[0]->proveedor.'-'.$numcompra[0]->num_compra.'.pdf');
    }
}
