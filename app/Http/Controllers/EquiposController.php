<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use Illuminate\Http\Request;

use App\Mail\NotificacionUsuario;
use Illuminate\Support\Facades\Mail;

class EquiposController extends Controller
{

   
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Equipos::all(),200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $equipos = Equipos::create([
    //         'dispositivo' => $request->dispositivo,
    //         'numserie' => $request->numserie,
    //         'modelo' => $request->modelo,
    //         'descripcion' => $request->descripcion,
    //         'tipomto' => $request->tipomto ?? 'Preventivo',
    //     ]);

    //     return response()->json($equipos, 201)
    //         ->header('Access-Control-Allow-Origin', '*')
    //         ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE, PUT');
    // }

    /**
     * Display the specified resource.
     */
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
            'dispositivo' => 'required|string',
            'numserie' => 'required|string',
            'modelo' => 'required|string',
            'descripcion' => 'required|string',
            'tipomto' => 'required|string',
        ]);

        $equipos = Equipos::create($validatedData);

        return response()->json($equipos, 201);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipos $equipos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $equipos = Equipos::find($id);
        if(is_null($equipos)){
            return response()->json(["mensaje" => "Equipo no encontrado"],404);
        }
        $equipos->update($request->all());
        return response()->json($equipos,201);
    }

    /**
     * Remove the specified resource from storage.
     */
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
