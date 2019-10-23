<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rol;
use App\Model\TipoDocumento;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class UserController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // dd($users[0]->Rol->nombre);
        $tipo_documento = TipoDocumento::all();
        
        /**Listar los roles en la ventana modal */
        $roles = Rol::select('id', 'nombre', 'descripcion')
                    ->where('condicion','1')
                    ->get();

        return view('user.index', compact('users','tipo_documento','roles'));
        // return $tipo_documento;
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
        // if(!$request->ajax()) return redirect('/');
        $user = new User();
        $user->nombre = $request->nombre;
        $user->tipo_documento = $request->tipo_documento;
        $user->num_documento = $request->num_documento;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->usuario = $request->usuario;
        $user->password = bcrypt($request->password);
        $user->condicion = '1';
        $user->idrol = $request->id_rol;

        /**INICIO REGISTAR IMAGEN DEL USUARIO */
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
            $path = $request->file('imagen')->storeAs('public/img/usuario', $fileNameToStore);
        } else {

            $fileNameToStore = "noimagen.png";
        }
        $user->imagen = $fileNameToStore;
        /**FIN DE REGISTRAR IMAGEN DEL USUARIO */

        $user->save();

        return Redirect::to("usuario");
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
        // dd($request->id_usuario);
        $user = User::findOrFail($request->id_usuario);
        $user->nombre = $request->nombre;
        $user->tipo_documento = $request->tipo_documento;
        $user->num_documento = $request->num_documento;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->usuario = $request->usuario; 
        $user->password = bcrypt($request->password);
        $user->condicion = '1';
        $user->idrol = $request->id_rol;

        /**CODIGO PARA EDITAR EL AVATAR DEL USUARIO */
        // Handle File Upload
        if($request->hasFile('imagen')){
            
            /*si la imagen que se subio es distinta a la que esta por defecto
            entonces se eliminaria la imagen anterior, eso es para evitar
            acumular imagenes en el servidor */
            if($user->imagen != 'noimagen.png'){
                Storage::delete('public/img/usuario/.$user->imagen');
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
            $path = $request->file('imagen')->storeAs('public/img/usuario', $fileNameToStore);

        } else {

            $fileNameToStore = $user->imagen;
        }
        $user->imagen = $fileNameToStore;
        /**FIN DEL EDITAR IMAGEN */

        $user->save();

        return Redirect::to("usuario");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrfail($request->id_usuario);
         
         if($user->condicion == "1") {

             $user->condicion = '0';
             $user->save();
             return Redirect::to("usuario");

         }else {

            $user->condicion = '1';
            $user->save();
            return Redirect::to("usuario");
         }
    }
}
