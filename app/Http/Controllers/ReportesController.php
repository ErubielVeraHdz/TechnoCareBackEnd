<?php

namespace App\Http\Controllers;

use App\Models\Reportes; // Importa el modelo correcto
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index()
    {
        return response()->json(Reportes::all(), 200);
    }

    public function resumen()
    {
        $equipos = Reportes::all();
        $total = $equipos->count(); // Contar los registros
        
        return response()->json([
            'total' => $total,         // Total de registros
            'data' => $equipos         // Lista de equipos
        ], 200);
    }

    public function store(Request $request)
    {

        dd($request->all());
        
        $reporte = new Reportes(); // Instancia del modelo correcto
        $reporte->emailU = $request->input('email');
        $reporte->equipID = $request->input('idEquipo');
        $reporte->fail = $request->input('falla');
        $reporte->solution = $request->input('solucion');
        $reporte->save();

        return response()->json(['message' => 'Reporte guardado con éxito', 'reporte' => $reporte], 201);
    }
}
