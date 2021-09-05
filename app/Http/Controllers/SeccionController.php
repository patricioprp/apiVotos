<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seccion;

class SeccionController extends Controller
{
    public function all(){
        return response()->json([
            'success' => true,
            'message' => 'secciones obtenidas correctamente',
            'data'=>Seccion::orderBy('nombre','asc')->get()
        ],200);
    }
}
