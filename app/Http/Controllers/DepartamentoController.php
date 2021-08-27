<?php

namespace App\Http\Controllers;
use App\Models\Departamento;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function all(){
        // return response()->json(['Msg' => Departamento::with('seccion','comunas.escuelas')->get()],200);
        return response()->json(['departamentos' => Departamento::all()],200);
    }
}
