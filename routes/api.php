<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/usuarios', [UsuariosController::class, 'index']); 
Route::post('/usuarios', [UsuariosController::class, 'store']); 
Route::post('/equipos', [EquiposController::class, 'store']);
Route::post('/login',[LoginController::class,'login']);


Route::get('/equipos', [EquiposController::class, 'index']); //Todos los empleados
Route::get('/equipos/{id}',[EquiposController::class,'show']); //Un empleado en específico
//Route::post('/agregareq',[EquiposController::class,'create']); //Agregar un nuevo empleado
Route::put('/equipos/{id}', [EquiposController::class, 'update']);//Actualizar
Route::delete('/equipos/{id}', [EquiposController::class, 'destroy']);//Eliminar

