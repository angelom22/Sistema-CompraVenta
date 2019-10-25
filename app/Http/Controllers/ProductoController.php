<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Model\Producto;
use App\Model\UnidadMedicion;

class ProductoController extends Controller
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
        if($request){

            // Para buscar y filtar los productos por nombre condigo oh atraves de su categoria.
            $sql = trim($request->get('buscarTexto'));
            $productos = DB::table('productos as p')
                        ->join('categorias as c', 'p.id_categoria', '=', 'c.id')
                        ->join('unidad_mediciones as u', 'p.medicion', '=', 'u.id')
                        ->select('p.id', 'p.id_categoria', 'p.nombre', 'p.precio_venta', 'p.precio_costo', 'p.precio_costo', 'p.codigo', 'p.stock', 'p.condicion', 'p.medicion', 'p.imagen', 'c.nombre as categoria', 'u.nombre as medida', 'u.letra')
                        ->where('p.condicion', '1')
                        ->where('p.nombre', 'LIKE', '%'.$sql.'%')
                        ->orwhere('c.nombre', 'LIKE', '%'.$sql.'%')
                        ->orwhere('p.codigo', 'LIKE', '%'.$sql.'%')
                        ->orderBy('p.id','desc')
                        ->paginate();
            // dd($productos[0]->medida);

            // listar las categorias en ventana modal
            $categorias = DB::table('categorias')
            ->select('id','nombre','descripcion')
            ->where('condicion', '=', '1')
            ->get();
            
            $unidades = UnidadMedicion::all();

            return view('producto.index',compact('productos','categorias','sql','unidades'));
            // return $productos;

        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->id_categoria = $request->id;
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->precio_venta = $request->precio_venta;
        $producto->precio_costo = $request->precio_costo;
        $producto->stock = '0';
        $producto->condicion = '1';
        $producto->medicion = $request->medida;

        // Código para la carga de la imagen del producto
        // Handle File Upload
        if($request->hasFile('imagen')){

            // Get filaname with the extension
            $filenamewithExt = $request->file('imagen')->getClientOriginalName();

            // Get just filaname
            $filEname = pathinfo($filenamewithExt,PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('imagen')->guessClientExtension();

            // FileName to store
            $fileNameToStore = time().'.'.$extension;

            // Upload Image
            $path = $request->file('imagen')->storeAs('public/img/producto', $fileNameToStore);
        } else {

            $fileNameToStore = "noimagen.png";
        }
        $producto->imagen = $fileNameToStore;

        $producto->save();



        return Redirect::to("producto");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    public function update(Request $request)
    {
        // dd($request->medida);
        $producto = Producto::findOrfail($request->id_producto);
        $producto->id_categoria = $request->id;
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->precio_venta = $request->precio_venta;
        $producto->precio_costo = $request->precio_costo;
        $producto->stock = '0';
        $producto->condicion = '1';
        $producto->medicion = $request->medida;

        // Cogido para actualizar la imagen del producto
        // Handle File Upload
        if($request->hasFile('imagen')){
            
            /*si la imagen que se subio es distinta a la que esta por defecto
            entonces se eliminaria la imagen anterior, eso es para evitar
            acumular imagenes en el servidor */
            if($producto->imagen != 'noimagen.png'){
                Storage::delete('public/img/producto/.$producto->imagen');
            }

            // Get filaname with the extension
            $filenamewithExt = $request->file('imagen')->getClientOriginalName();

            // Get just filaname
            $filEname = pathinfo($filenamewithExt,PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('imagen')->guessClientExtension();

            // FileName to store
            $fileNameToStore = time().'.'.$extension;

            // Upload Image
            $path = $request->file('imagen')->storeAs('public/img/producto', $fileNameToStore);

        } else {

            $fileNameToStore = $producto->imagen;
        }

        $producto->imagen = $fileNameToStore;

        $producto->save();

        return Redirect::to("producto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $producto = Producto::findOrfail($request->id_producto);
         
         if($producto->condicion == "1") {

             $producto->condicion = '0';
             $producto->save();
             return Redirect::to("producto");

         }else {

            $producto->condicion = '1';
            $producto->save();
            return Redirect::to("producto");
         }
    }
}
