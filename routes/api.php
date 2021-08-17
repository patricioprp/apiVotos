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

Route::post('/user',function(Request $request){
    $user = new App\Models\User();
    $user->name = $request->name;
    $user->email = "patricio2@patricio.com";
    $user->password = Hash::make(123456);
    $user->save();
    return response()->json(["msj"=>"se guardo"],200);
});

Route::middleware('auth:api')->get('/users',function(Request $request){
    return response()->json(["msj"=>App\Models\User::all()]);
});

Route::get('/login',function(){
    return response()->json(["mens"=>"no podes"],401);
})->name('login');