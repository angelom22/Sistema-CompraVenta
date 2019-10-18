<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Middleware para que usuarios invitados (NO AUTENTICADOS) puedan ver el login del sistema
Route::group(['middleware' => ['guest']], function () {
    // Ruta para el login
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/login','Auth\LoginController@login')->name('login');
});

// Rutas para las diferentes visats de los usuarios del sistema
Route::group(['middleware' => ['auth']], function () {
    
    // ruta para cuando el usuario se desloguea del sistema
    Route::post('/logout','Auth\LoginController@logout')->name('logout');

    // ruta para redireccionamiento luego de loguearse
    Route::get('/home', 'HomeController@index')->name('home');

    // Middleware para Comprador
    Route::group(['middleware' => ['Comprador']], function () {
        
        Route::resource('categoria','CategoriaController');
        Route::resource('producto','ProductoController');
        Route::resource('proveedor','ProveedorController');
        Route::resource('compra','CompraController');
        Route::get('/pdfCompra/{id}', 'CompraController@pdf')->name('Compra_pdf');
    });

    // Middleware para Vendedor 
    Route::group(['middleware' => ['Vendedor']], function () {
        
        Route::resource('categoria','CategoriaController');
        Route::resource('producto','ProductoController');
        Route::resource('cliente','ClienteController');
    });
    
    // Middleware para Administrador 
    Route::group(['middleware' => ['Administrador']], function () {
        Route::resource('categoria','CategoriaController');
        Route::resource('producto','ProductoController');
        Route::resource('proveedor','ProveedorController');
        Route::resource('compra','CompraController');
        Route::get('/pdfCompra/{id}', 'CompraController@pdf')->name('Compra_pdf');
        Route::resource('cliente','ClienteController');
        Route::resource('rol','RolController');
        Route::resource('usuario','UserController');
    });

    // Middleware para socio 
    // Route::group(['middleware' => ['socio']], function () {
        
    // });

    // Middleware para Gerente 
    // Route::group(['middleware' => ['socio']], function () {
        
    // });

    
});



// Route::get('cliente', function () {
//     return view('cliente.index');
// });

// Route::resource('categoria','CategoriaController');

// Route::resource('producto','ProductoController');

// Route::resource('proveedor','ProveedorController');

// Route::resource('cliente','ClienteController');

// Route::resource('rol','RolController');

// Route::resource('usuario','UserController');

// Auth::routes();

