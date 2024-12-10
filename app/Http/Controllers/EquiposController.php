<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use Illuminate\Http\Request;
use App\Mail\NotificacionEquipo;
use App\Mail\NotificacionEquipo2;

use Illuminate\Support\Facades\Mail;
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
        'emailU' => 'required|string|email',
        'dispositivo' => 'required|string',
        'numserie' => 'required|string',
        'modelo' => 'required|string',
        'descripcion' => 'required|string',
        'tipomto' => 'required|string',
    ]);

    try {
        // Guardar los datos en la base de datos
        $equipos = Equipos::create($validatedData);

        // Preparar detalles del correo
        $details = [
            'message' => 
                         'Dispositivo: ' . $validatedData['dispositivo'] . ',  Modelo: ' . $validatedData['modelo'] .
                         ',  Número de serie: ' . $validatedData['numserie'] . '.',
            'user' => $validatedData['nombreU'],
        ];

        // Enviar correo
        Mail::to('chuchoalonso777@gmail.com')->send(new NotificacionEquipo($details));

        return response()->json(['message' => 'Registro creado y correo enviado con éxito', 'data' => $equipos], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ocurrió un error: ' . $e->getMessage()], 500);
    }
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
