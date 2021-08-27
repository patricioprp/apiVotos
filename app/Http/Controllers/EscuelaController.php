<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escuela;

class EscuelaController extends Controller
{
    public function all(){
        return response()->json(['escuelas'=>Escuela::all()],200);       
       }

    public function findById($id_comuna){
        $escuelas = Escuela::where('comuna_id',$id_comuna)->get();
        return response()->json(['escuelasByComuna'=>$escuelas],200);
    }
}
