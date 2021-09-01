<?php

namespace App\Http\Controllers;
use App\Models\Comuna;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class ComunaController extends Controller
{
    public function all(){
        return response()->json(['circuitos'=>Comuna::all()],200);
    }

    public function findById($id_departamento){
        $comunas = Comuna::where('departamento_id',$id_departamento)->get();
        return response()->json(['circuitosByLocalidad'=>$comunas],200);
    }
}
