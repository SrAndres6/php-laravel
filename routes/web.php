<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AprendizController;
// Redirige la raíz al listado de Aprendices (UX simple)
Route::redirect('/', '/aprendices');
// Grupo protegido: todas las rutas dentro requieren login
Route::middleware(['auth'])->group(function () {
// Recurso REST para el CRUD de Aprendices
Route::resource('aprendices', AprendizController::class);
});

// Rutas de autenticación generadas por Breeze
require __DIR__.'/auth.php';
