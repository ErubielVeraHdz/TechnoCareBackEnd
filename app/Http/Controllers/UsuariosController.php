<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Usuarios::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $usuario = Usuarios::create($request->all());
        return response()->json($usuario,201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'phone' => 'nullable|string|max:15',
            'password' => 'required|string|min:8',
            'type' => 'required|string|max:20',
        ]);

        $usuario = Usuarios::create($request->all());
        return response()->json($usuario,201);

        //dd($request->all());

        /*$usuario = Usuarios::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'type' => $request->type ?? 'Cliente',
        ]);

        return response()->json($usuario, 201)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE, PUT');*/
    }


    /**
     * Display the specified resource.
     */
    public function show($idUser)
    {
      // Obtener el usuario por ID
      $usuario = Usuarios::find($idUser);

      // Verificar si se encuentra el usuario
      if ($usuario) {
          return response()->json($usuario, 200); // Retornar los datos del usuario
      }

      // Si no se encuentra, retornar un error 404
      return response()->json(['message' => 'Usuario no encontrado'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        
        $rules = [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email,' . $usuarios->id,
            'phone' => 'nullable|string|max:15',
            'newPassword' => 'nullable|string|min:8', // Opcional
            'confirmPassword' => 'nullable|string|same:newPassword', // Debe coincidir si está presente
        ];

        // Validar datos
        $request->validate($rules);

        // Actualizar datos de usuario
        $usuarios->name = $request->input('name');
        $usuarios->lastname = $request->input('lastname');
        $usuarios->email = $request->input('email');
        $usuarios->phone = $request->input('phone');

        // Actualizar la contraseña si se da
        if ($request->filled('newPassword')) { 
            $usuarios->password = bcrypt($request->input('newPassword'));
        }

        // Guardar los cambios
        $usuarios->save();

        // Responder con éxito
        return response()->json([
            'message' => 'Usuario actualizado con éxito',
            'usuario' => $usuarios,
        ], 200);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuarios $usuarios)
    {
         $usuarios = Usuarios::find($usuarios);
        if(is_null($usuarios)){
            return response()->json(["mensaje" => "Empleado no encontrado"],404);
        }
        $usuarios->delete();
        return response()->json(['message' => 'Usuario eliminado con éxito']);
    }

    public function login(Request $request)
    {
        
    }
} 