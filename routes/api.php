<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\MailController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*Route::middleware('auth:sanctum')->group(function () {
    Route::post('/equipos', [EquiposController::class, 'store']);
});*/

Route::put('/usuarios/{usuarios}', [UsuariosController::class, 'update']);
Route::get('usuarios/{idUser}', [UsuariosController::class, 'show']);
Route::get('/usuarios', [UsuariosController::class, 'index']); 
Route::post('/usuarios', [UsuariosController::class, 'store']); 
Route::post('/equipos', [EquiposController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);


Route::get('/equipos', [EquiposController::class, 'index']); //Todos los equipos
Route::get('/equipos/{id}',[EquiposController::class,'show']); //Un equipo en específico
Route::put('/equipos/{id}', [EquiposController::class, 'update']);//Actualizar
Route::delete('/equipos/{id}', [EquiposController::class, 'destroy']);//Eliminar

Route::get('/reportes', [ReportesController::class, 'index']); //Todos los reportes

Route::post('/send-mail', [MailController::class, 'sendMail']);