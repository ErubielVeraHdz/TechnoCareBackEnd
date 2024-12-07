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
}
