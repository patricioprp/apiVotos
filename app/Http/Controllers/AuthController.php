<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
      /**
     * Registro de usuario
     */
    public function signUp(Request $request)
    {
       // agregar try catch

        // Creamos las reglas de validación
        $rules = [
            'name'      => 'required|string',
            'email'     => 'required|string|email|unique:users',
            'dni'       => 'required|Integer|unique:users',
            'mesa_id'   => 'required|Integer|Min:1|Max:4|unique:users',
            'password'  => 'required|string'
            ];
        // Ejecutamos el validador, en caso de que falle devolvemos la respuesta
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'created' => false,
                'errors'  => $validator->errors()->all()
            ],500);
        }

        try {
            DB::beginTransaction();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'dni' => $request->dni,
            'mesa_id' => $request->mesa_id,
            'password' => bcrypt($request->password)
        ]);
        DB::commit();
        Log::info('Se guardo el usuario ' . $request->apellido);
        return response()->json([
            'message' => 'Successfully created user!',
            'success' => true,
            'message' => "usuario registrado correctamente",
        ], 201);
    } catch (\PDOException $e) {
        DB::rollBack();
        Log::error('Error al almacenar el usuario:' . $request->apellido . $e->getMessage());
        return response()->json([
            'message' => $e->getMessage()
        ], 500);
     }
    }

    /**
     * Inicio de sesión y creación de token
     */
    public function login(Request $request)
    {

        // Creamos las reglas de validación
        $rules = [
            'email'     => 'required|string|email',
            'password'  => 'required'
            ];
        // Ejecutamos el validador, en caso de que falle devolvemos la respuesta
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'created' => false,
                'errors'  => $validator->errors()->all()
            ],500);
        }

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            "success"=> true,
            "messagge"=> "Usuario logueado correctamente",
        ]);
    }

    /**
     * Cierre de sesión (anular el token)
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Obtener el objeto User como json
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
