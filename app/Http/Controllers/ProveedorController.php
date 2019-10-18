<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Proveedor;
use App\Model\TipoDocumento;
use Illuminate\Support\Facades\Redirect;
use DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proveedores = Proveedor::all();
        $tipo_documento = TipoDocumento::all();
        // dd($proveedores[0]->TipoDocumento->letra_documento);

        // dd($tipo_documento[0]->letra_documento);
        // $sql = trim($request->get('buscarTexto'));

        // if($request){
        //     $sql = trim($request->get('buscarTexto'));
        //     $proveedores = Proveedor::where('nombre_empresa','LIKE','%'.$sql.'%')
        //                     ->orwhere('num_documento', 'LIKE','%'.$sql.'%')
        //                     ->orderBy('id', 'desc')
        //                     ->paginate(3);

            
        //     return view('proveedor.index',compact('proveedores','sql'));
        //     // return $proveedores;

        // }  

        return view('proveedor.index',compact('proveedores','tipo_documento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Motodo para registrar nuevos proveedores
        $proveedor = new Proveedor();
        $proveedor->nombre_empresa = $request->nombre_empresa;
        $proveedor->responsable = $request->responsable;
        $proveedor->tipo_documento = $request->tipo_documento;
        $proveedor->num_documento = $request->num_documento;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->email = $request->email;
        // $proveedor->imagen = $request->imagen;
        $proveedor->save();

        return Redirect::to("proveedor");
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
    public function update(Request $request)
    {
        $proveedor = Proveedor::findOrfail($request->id_proveedor);
        $proveedor->nombre_empresa = $request->nombre_empresa;
        $proveedor->responsable = $request->responsable;
        $proveedor->tipo_documento = $request->tipo_documento;
        $proveedor->num_documento = $request->num_documento;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->email = $request->email;
        // $proveedor->imagen = $request->imagen;
        $proveedor->save();

        return Redirect::to("proveedor");
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
