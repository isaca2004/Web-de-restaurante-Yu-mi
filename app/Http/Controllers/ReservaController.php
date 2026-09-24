<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Mail\NuevaReserva;
use Illuminate\Support\Facades\Mail;

class ReservaController extends Controller
{
    /**
     * Muestra el listado de todas las reservas.
     * Se ordenan primero por fecha y luego por turno (hora),
     * para que salgan en el orden en que va a ir llegando la gente.
     */
    public function index()
    {
        //Busca todas las filas de la tabla 'reservas' en la BD.
        $reservas = Reserva::orderBy('date')->orderBy('time')->get();

        //Envia esas reservas a la vista 'reservas/index.blade.php'
        //'compact('reservas')' es un atajo para pasar la variable $reservas a la vista.
        return view('reservas.index', compact('reservas'));
    }

    //Guarda una nueva reserva enviada desde el formulario público
    public function store(Request $request)
    {
        //Valida los datos: si algo no cumple las reglas, Laravel devuelve
        //error 422 con los detalles
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'date' => 'required|date',
            'time' => 'required|string',
            'guests' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string',
        ]);

        //Crea la reserva en la base de datos con los datos ya validados
        $reserva = Reserva::create($datos);

        // Envía el email al restaurante con los datos de esta reserva.
    // 'reservas@yu-mi.es' es provisional — cuando tengáis el email
    // real del restaurante, se cambia solo aquí.
        Mail::to('reservas@yu-mi.es')->send(new NuevaReserva($reserva));
    
        return response()->json(['ok'=>true]);
    }
}
