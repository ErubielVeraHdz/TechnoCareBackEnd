<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionEquipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string',
        ]);

        $details = [
            'message' => $validatedData['message']
        ];

        Mail::to('elzeldero28@gmail.com')->send(new NotificacionEquipo($details));

        return response()->json(['message' => 'Correo enviado con éxito'], 200);
    }
}
