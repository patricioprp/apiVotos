<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/',function(){
    //cuando Passport no reconoce el token redirecciona a una ruta de nombre "login"
    return response()->json([
        "success" => false,
        "message"=>"Necesita estar logueado"
    ],401);
})->name('login');



//Ruta localidad = tabla departamento
//Ruta circuito = tabla comuna
Route::get('/secciones','App\Http\Controllers\SeccionController@all');
Route::get('/localidades','App\Http\Controllers\DepartamentoController@all');
Route::get('/circuitos','App\Http\Controllers\ComunaController@all');
Route::get('/escuelas','App\Http\Controllers\EscuelaController@all');
Route::get('/mesas','App\Http\Controllers\MesaController@all');
Route::get('/partidos','App\Http\Controllers\PartidoController@all');
Route::get('/subpartidos','App\Http\Controllers\SubpartidoController@all');
Route::get('/partidos-full','App\Http\Controllers\PartidoController@full');


Route::get('/localidad-comunas/{id}','App\Http\Controllers\ComunaController@findById');
Route::get('/circuito-escuelas/{id_circuito}','App\Http\Controllers\EscuelaController@findById');
Route::get('/escuela-mesas/{id_escuela}','App\Http\Controllers\MesaController@findById');

Route::get('/escuelasByLocalidad/{id_localidad}','App\Http\Controllers\EscuelaController@getEscuelas');




Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signUp');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('user', 'App\Http\Controllers\AuthController@user');
        Route::get('users','App\Http\Controllers\UserController@all');
    });
});