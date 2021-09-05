<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all(){

     return response()->json([
        'success' => true,
        'message' => 'usuarios obtenidos correctamente',
         'data'=>User::orderBy('nombre','asc')->get()
        ],200);
        
    }
}
