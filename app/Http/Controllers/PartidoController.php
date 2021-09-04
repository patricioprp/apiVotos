<?php

namespace App\Http\Controllers;
use App\Models\Partido;

use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function all(){
        return response()->json(['partidos' => Partido::all()],200);
    }

    public function full(){
        return response()->json(['partidos-subpartidos' => Partido::with('subPartidos')->get()],200);
    }
}
