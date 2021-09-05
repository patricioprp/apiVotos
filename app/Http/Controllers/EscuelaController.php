<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escuela;
use App\Models\Departamento;

class EscuelaController extends Controller
{
    public function all(){
        return response()->json([
            'success' => true,
            'message' => 'escuelas obtenidas correctamente',
            'data'=>Escuela::orderBy('nombre','asc')->get()
        ],200);       
       }

    public function findById($id_comuna){
        $escuelas = Escuela::where('comuna_id',$id_comuna)->orderBy('nombre','asc')->get();
        return response()->json([
            'success' => true,
            'message' => 'escuelas obtenidas por circuito',
            'data'=>$escuelas
        ],200);
    }

    public function getEscuelas($id_localidad){
        //validar el find or fail del id_localidad
        $escuelas = Departamento::join('comunas','departamentos.id','=','comunas.departamento_id')
        ->where('comunas.departamento_id','=',$id_localidad)
        ->join('escuelas',function($j){
            $j->on('escuelas.comuna_id','=','comunas.id');
        })
        ->orderBy('escuelas.nombre','asc')->get();
        return response()->json([
            'success' => true,
            'message' => 'escuelas obtenidas por departamento correctamente',
            'data'=>$escuelas
        ],200);
    }
}
