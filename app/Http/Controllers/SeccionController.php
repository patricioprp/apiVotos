<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seccion;

class SeccionController extends Controller
{
    public function all(){
        return response()->json(['secciones'=>Seccion::all()],200);
    }
}
