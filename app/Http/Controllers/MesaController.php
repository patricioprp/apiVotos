<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\SubPartido;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MesaController extends Controller
{
    public function all(){
        return response()->json([
            'success' => true,
            'message' => 'escuelas obtenidas correctamente',
            'data' => Mesa::orderBy('nro_mesa','asc')->get()
        ],200);
    }

    public function findById($id_escuela){
        $mesas = Mesa::where('escuela_id',$id_escuela)->get();
        return response()->json([
            'success' => true,
            'message' => 'Mesas de escuela obtenida correctamente',
            'data' => $mesas
        ],200);
    }

    public function getSubpartidos(){
        $mesas = Mesa::all();
        return response()->json([
            'success' => true,
            'message' => 'Mesa obtenida correctamente',
            'data' => $mesas
        ],200);
    }

    public function voto(Request $request){
        return response()->json(['data' => $request->all()],200);
    }
}
