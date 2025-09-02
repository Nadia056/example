<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Almacen;
use App\Models\AlmacenProducto;
use App\Models\ClienteProducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productoController extends Controller
{

    public function create(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Usuario no autenticado',
                'data' => []
            ]);
        }

        $validated = $request->validate([
            'nombre' => 'required ',
            'descripcion' => 'required | max:100',
            'cantidad' => 'required | numeric | min:1',
            'precio' => 'required',
            'almacen' => 'required | string '

        ]);
        $findAlmacen = Almacen::where('nombre', $validated['almacen'])->first();

        if (!$findAlmacen) {
            return response()->json([
                'status' => 404,
                'message' => 'almacen no encontrado',
                'data' => []
            ]);
        }

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
            'precio' => $validated['precio'],
        ])->save();

        $clienteProducto= ClienteProducto::create([
                'idCliente' => $user->id,
                'idProducto' => $producto->id
            ])->save();

        $almacenproducto= AlmacenProducto::create(
            [
                'idAlmacen' => $findAlmacen->id,
                'idProducto' => $clienteProducto->id
            ]
        )->save();

       

        return response()->json([
            'status' => 200,
            'message' => 'producto creado con exito',
            'data' => $producto
        ]);
    }

    public function ProductosCliente(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Usuario no autenticado',
                'data' => []
            ]);
        }

        $productos = ClienteProducto::where('idCliente', $user->id)->with('producto')->get();

        return response()->json([
            'status' => 200,
            'message' => 'Productos del cliente obtenidos con exito',
            'data' => $productos
        ]);
    }




}
