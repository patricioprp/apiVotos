<?php

namespace App\Http\Controllers;
use App\Models\Partido;

use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function all(){
        return response()->json(['partidos' => Partido::all()],200);
    }
}
