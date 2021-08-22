<?php

namespace App\Http\Controllers;
use App\Models\Departamento;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function all(){
        return response()->json(['Msg' => Departamento::with('comunas.escuelas','seccion')->get()],200);
    }
}
