<?php

namespace App\Http\Controllers;
use App\Models\Partido;

use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function all(){
        return response()->json([
            'success' => true,
            'message' => 'partidos obtenidos correctamente',
            'data' => Partido::orderBy('nombre','asc')->get()
        ],200);
    }

    public function full(){
        return response()->json([
            "success" => true,
            "message" => "Partidos y subpartidos obtenidos correctamente",
            'data' => Partido::with('subPartidos')->orderBy('nombre','asc')->get()
        ],200);
    }
}
