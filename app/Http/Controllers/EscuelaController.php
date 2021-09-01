<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escuela;
use App\Models\Departamento;

class EscuelaController extends Controller
{
    public function all(){
        return response()->json(['escuelas'=>Escuela::all()],200);       
       }

    public function findById($id_comuna){
        $escuelas = Escuela::where('comuna_id',$id_comuna)->get();
        return response()->json(['escuelasByComuna'=>$escuelas],200);
    }

    public function getEscuelas($id_localidad){
        //hacer un join
        $escuelas = Departamento::join('comunas','departamentos.id','=','comunas.departamento_id')
        ->where('comunas.departamento_id','=',$id_localidad)
        ->join('escuelas',function($j){
            $j->on('escuelas.comuna_id','=','comunas.id');
        })
        ->get();
        return response()->json(['EscuelasByLocalidad'=>$escuelas],200);
    }
}
