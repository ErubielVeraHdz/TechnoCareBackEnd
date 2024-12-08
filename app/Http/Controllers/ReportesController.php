<?php

namespace App\Http\Controllers;

use App\Models\Reportes;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index()
    {
        return response()->json(Reportes::all(),200);

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'emailU' => 'required|string',
            'equipID' => 'required|string',
            'fail' => 'required|string',
            'solution' => 'required|string'
        ]);

        $equipos = Reportes::create($validatedData);

        return response()->json($equipos, 201);
    }
}
