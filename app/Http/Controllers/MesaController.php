<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\User;
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

        $rules = [
            'total_mesa'     => 'required|integer',
            ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'created' => false,
                'errors'  => $validator->errors()->all()
            ],500);
        }

        try{
            $mesa = Mesa::findOrFail($request->id_mesa);
            $mesa->votos_totales = $request->total_mesa;
            $mesa->cierre_votacion = now()->format('Y-m-d');
            $mesa->save();

            try {
                DB::beginTransaction();
                foreach($request->votos_subpartidos as $votos){
                    $mesa->subPartidos()->attach($votos['id'],array(
                        'voto_diputado'=>$votos['cantidades']['diputados'],
                        'voto_senador'=>$votos['cantidades']['senadores']
                    ));
                }
                DB::commit();
                Log::info('Se guardo el voto ');
                return response()->json([
                    'success' => true,
                    'message' => "Se registro el voto correctamente",
                ], 201);
            } catch (\PDOException $e) {
                DB::rollBack();
                Log::error('Error al almacenar el voto' . $e->getMessage());
            }

        }catch(ModelNotFoundException $exception){
            Log::error('No se encontro la mesa ' . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ],500);
        }

    }

    public function getMesaVotos(Request $request){
            return response()->json([
                'success' => true,
                'message' => "votos obtenidos correctamente",
                'data' =>  User::with('mesa','mesa.subPartidos')->get()
            ]);
    }
}
