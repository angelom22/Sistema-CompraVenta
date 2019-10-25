<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\Categoria;
use Illuminate\Support\Facades\Redirect;

 
class CategoriaController extends Controller
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

            $sql = trim($request->get('buscarTexto'));
            $categorias = DB::table('categorias')->where('nombre','LIKE','%'.$sql.'%')
                            ->orderBy('id', 'desc')
                            ->paginate(5);

            // return view('categoria.index',["categorias"=>$categoria,"buscarTexto"=>$sql]);
            return view('categoria.index',compact('categorias','sql'));
            // return $categoria;

        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion = '1';
        $categoria->save();

        return Redirect::to("categoria");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    public function update(Request $request)
    {
        $categoria = Categoria::findOrfail($request->id_categoria);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion = '1';
        $categoria->save();

        return Redirect::to("categoria");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        // dd($request->id_categoria);
         $categoria = Categoria::findOrFail($request->id_categoria);

         if($categoria->condicion == "1") {

             $categoria->condicion = '0';
             $categoria->save();
             return Redirect::to("categoria");

         }else {

            $categoria->condicion = '1';
            $categoria->save();
            return Redirect::to("categoria");
         }
    }
}
