<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Rol;
use App\TrUserRol;
use App\Model\TipoDocumento;
use App\Http\Requests\ActualizarUsuarioRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:1', ['except' => ['edit','update','show','destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // dd($users[0]->Rol->nombre);
        // dd($users[0]->roles); 
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
        // dd($request->id_roles);
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
        // $user->idrol = $request->id_rol;

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

        // codigo para guardar los roles cuando sean un arreglo
        foreach ($request->id_roles as $key ) {
            $TrUserRol = TrUserRol::create([
                'user_id' => $user->id,
                'rol_id' => $key
            ]);
        }

        

        return Redirect::to("usuario")->with('info', 'Usuario Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $this->authorize($user);

        return view('user.edit', compact('user'));

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
        // dd($id);
        // $user = User::where('id', $id)->first()
        $user = User::findOrFail($request->id_usuario);
        $this->authorize($user);
        $user->nombre = $request->nombre;
        $user->tipo_documento = $request->tipo_documento;
        $user->num_documento = $request->num_documento;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->usuario = $request->usuario; 
        $user->password = bcrypt($request->password);
        $user->condicion = '1';
        // $user->idrol = $request->id_rol;

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

        // Actualizar roles del usuario
        // $TrUserRol = TrUserRol::where('user_id', $user->id )
        //                         ->update([
        //                             'rol_id' => $request->id_roles
        //                         ]);

        //Eliminar roles del Usuario Actual
        TrUserRol::where('user_id', $request->id_usuario)->delete();
        
        //Guardar los nuevos roles del usuario
        foreach ($request->id_roles as $key ) {
            $TrUserRol = TrUserRol::create([
                'user_id' => $user->id,
                'rol_id' => $key
            ]);
        }        

        return Redirect::to("usuario")->with('info', 'Usuario Actualizado Correctamente');
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
        
        // $this->authorize($user); //Codigo para autorizar al usuario hacer el cambio del estado

        if($user->condicion == "1") {

             $user->condicion = '0';
             $user->save();
             return Redirect::to("usuario")->with('info', 'Usuario cambiado de estado de forma correcta');

        }else {

            $user->condicion = '1';
            $user->save();
            return Redirect::to("usuario")->with('info', 'Usuario cambiado de estado de forma correcta');
        }
    }
}
