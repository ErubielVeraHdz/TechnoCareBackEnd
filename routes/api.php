<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EquiposController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/usuarios', [UsuariosController::class, 'index']); 
Route::post('/usuarios', [UsuariosController::class, 'store']); 

Route::post('/equipos', [EquiposController::class, 'store']);


