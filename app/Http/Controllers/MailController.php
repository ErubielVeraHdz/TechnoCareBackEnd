<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionEquipo;
use App\Mail\NotificacionEquipo2;
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
    
        try {
            Mail::to('elzeldero28@gmail.com')->send(new NotificacionEquipo($details));
            return response()->json(['message' => 'Correo enviado con éxito'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al enviar el correo: ' . $e->getMessage()], 500);
        }
    }

    public function sendemail(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string',
        ]);
    
        $details = [
            'message' => $validatedData['message']
        ];
    
        try {
            Mail::to('elzeldero28@gmail.com')->send(new NotificacionEquipo2($details));
            return response()->json(['message' => 'Correo enviado con éxito'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al enviar el correo: ' . $e->getMessage()], 500);
        }
    }
    
}
