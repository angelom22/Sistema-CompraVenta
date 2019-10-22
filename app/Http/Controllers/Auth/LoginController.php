<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // /*
    // |--------------------------------------------------------------------------
    // | Login Controller
    // |--------------------------------------------------------------------------
    // |
    // | This controller handles authenticating users for the application and
    // | redirecting them to your home screen. The controller uses a trait
    // | to conveniently provide its functionality to your applications.
    // |
    // */

    // use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = '/home';

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function showLoginForm(){
        return view('auth.login');
    }

    // CAMPOS A SER REQUERIDOS Y EVALUADOS PARA EL LOGING AL SISTEMA
    protected function validateLogin(Request $request){
        $this->validate($request,[
            'usuario'   => 'required|string',
            'password'  => 'required|string'
        ]);
    }

    // METODO PARA LOGUEARSE Y VALIDACION DE LAS CREDENCIALES
    public function login(Request $request){
        
        // $this->validateLogin($request);

        // if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password, 'condicion' => 1])){
        //     return redirect('/home');
        // }

        // return back()->withErrors(['usuario' => trans('auth.failed')])
        //         ->withInput(request(['usuario']));

        $credentials = [
            'usuario' => $request->usuario,
            'password' => $request->password,
            'condicion' => 1
        ];
        
        if (Auth::attempt($credentials)) {
            $usuario = $request->usuario;
            $route = '/home';
            // dd($usuario);
            // return $usuario;
            return response()->json($route);
        } else {
            $errors = 'Usuario o contraseña invalida';
            $code   = 422;
            return response()->json($errors, $code);
        }

    }

    //  METODO PARA CERRAR SESION DEL USUARIO
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }

}
