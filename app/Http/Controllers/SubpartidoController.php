<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubPartido;

class SubpartidoController extends Controller
{
        public function all(){
            return response()->json([
                'success' => true,
                'message' => 'Listas obtenidas correctamente',
                'data' => SubPartido::orderBy('nombre','asc')->get()
            ],200);
        }
}
