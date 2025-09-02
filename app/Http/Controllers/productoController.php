<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productoController extends Controller
{

    public function create(Request $request)
    {

        $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required | max:100',
            'cantidad' => 'required',
            'precio' => 'required',
            
        ]);

        if ($validated) {
            return response()->json([
                'status' => 412,
                'message' => 'verifica los datos',
                'data' => []
            ]);
        }

        $producto = Producto::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'cantidad ' => $validated['cantidad'],
            'precio' => $validated['presio'],
        ]);

       
         return response()->json([
                'status' => 200,
                'message' => 'producto creado con exito',
                'data' => $producto
            ]);
    }
}
