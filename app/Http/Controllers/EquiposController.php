<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use Illuminate\Http\Request;
use App\Mail\NotificacionEquipo;
use App\Mail\NotificacionEquipo2;
class EquiposController extends Controller
{

    public function index()
    {
        return response()->json(Equipos::all(),200);

    }

    public function create(Request $request)
    {
        
    }

    public function show($id)
    {
        $equipos = Equipos::find($id);
        if(is_null($equipos)){
            return response()->json(["mensaje" => "Equipo no encontrado"],404);
        }
        return response()->json($equipos,200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombreU' => 'required|string',
            'emailU' => 'required|string',
            'dispositivo' => 'required|string',
            'numserie' => 'required|string',
            'modelo' => 'required|string',
            'descripcion' => 'required|string',
            'tipomto' => 'required|string',
        ]);

        $equipos = Equipos::create($validatedData);

        return response()->json($equipos, 201);
    }

    public function edit(Equipos $equipos)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $equipos = Equipos::find($id);
        if(is_null($equipos)){
            return response()->json(["mensaje" => "Equipo no encontrado"],404);
        }
        $equipos->update($request->all());
        return response()->json($equipos,201);
    }

    public function destroy( $id)
    {
        $equipos = Equipos::find($id);
        if(is_null($equipos)){
            return response()->json(["mensaje" => "Empleado no encontrado"],404);
        }
        $equipos->delete();
        return response()->json(['message' => 'Usuario eliminado con éxito']);
    }
}
