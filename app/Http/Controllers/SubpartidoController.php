<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubPartido;

class SubpartidoController extends Controller
{
        public function all(){
            return response()->json(['subpartidos' => SubPartido::all()],200);
        }
}
