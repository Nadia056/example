<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class authController extends Controller
{
    //

    // ejemplo de login pero si contraseña 

    public function login(Request $request)
    {
        $validated = $request->validate([
            'Nombre' => 'required',
            
        ]);

        $findClient = Cliente::where('Nombre', $validated['Nombre'])->first();

        if (!$findClient) {
            return response()->json([
                'status' => 404,
                'message' => 'usuario no encontrado',
                'data' => []
            ]);
        }

        $token = $findClient->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 200,
            'message' => 'usuario autenticado con exito',
            'data' => [
                'token' => $token
            ]
        ]);
    }
    

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 200,
            'message' => 'sesion cerrada con exito',
            'data' => []
        ]);
    }
}
