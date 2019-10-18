<?php

use Illuminate\Http\Request;
use App\Model\Cliente;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/cliente', function (Request $request) {
//     return $request->user();
// });

Route::get('cliente', function(){
    return datatables()
            ->eloquent(Cliente::query())
            ->addColumn('btn', 'cliente.recursos.botones')
            ->rawColumns(['btn'])
            ->toJson();
});