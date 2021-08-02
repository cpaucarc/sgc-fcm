<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ResponsabilidadSocialController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('registro', [RegistroController::class, 'index'])->name('registro');

Route::get('actividades', [ActividadController::class, 'index'])
    ->name('actividad.actividades');

Route::get('mis-actividades/{id}/{ciclo}', [ActividadController::class, 'show'])
    ->name('actividad.mis-actividades');

Route::get('responsabilidad-social', [ResponsabilidadSocialController::class, 'index'])
    ->name('rrss.index');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('storage/{file}', function ($file) {
    return Storage::response($file);
})->name('documentos');
