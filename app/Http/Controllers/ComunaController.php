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
        return response()->json(['comunas'=>Comuna::all()],200);
    }

    public function findById($id_departamento){
        // $rules = [
        //     'id_departamento'       => 'required|Integer'
        //     ];
        // $validator = \Validator::make($id_departamento, $rules);
        // if ($validator->fails()) {
        //     return response()->json([
        //         'created' => false,
        //         'errors'  => $validator->errors()->all()
        //     ],500);
        // }

        $comunas = Comuna::where('departamento_id',$id_departamento)->get();
        return response()->json(['comunasByDepartamento'=>$comunas],200);
    }
}
