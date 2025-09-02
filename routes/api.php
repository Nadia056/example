<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\productoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [authController::class, 'login']);
Route::post('/logout', [authController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/producto', [productoController::class, 'create']);
    Route::get('/productos', [productoController::class, 'ProductosCliente']);
});
