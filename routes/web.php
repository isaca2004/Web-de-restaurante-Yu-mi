<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// Ruta del panel de reservas.
// 'middleware(auth)' hace que solo pueda verla alguien que haya iniciado sesión;
// si alguien sin login intenta entrar, Laravel le redirige a /login automáticamente.
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');

require __DIR__.'/auth.php';
