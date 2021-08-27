<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MesaController extends Controller
{
    public function all(){
        return response()->json(['mesas'=>Mesa::all()],200);
    }

    public function findById($id_escuela){
        $mesas = Mesa::where('escuela_id',$id_escuela)->get();
        return response()->json(['mesasByEscuela'=>$mesas],200);
    }
}
