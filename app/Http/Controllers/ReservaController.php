<?php

namespace App\Http\Controllers;

use App\Models\Reserva;

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
}
