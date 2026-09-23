<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //Los campos que el formulario puede rellenar directamente
    protected $fillable = ['name', 'phone', 'email', 'date', 'time', 'guests', 'notes'];
}
