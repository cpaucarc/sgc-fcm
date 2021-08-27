<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ResponsabilidadSocialController;
use App\Http\Controllers\SustentacionController;
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

Route::prefix('responsabilidad-social')->group(function () {
    Route::get('crear', [ResponsabilidadSocialController::class, 'registro'])
        ->name('rrss.registro');

    Route::get('editar/{id}', [ResponsabilidadSocialController::class, 'editar'])
        ->name('rrss.editar');

    Route::get('empresas', [ResponsabilidadSocialController::class, 'empresas'])
        ->name('rrss.empresas');

    Route::get('side', function () {
        return view('rrss.my-side');
    })->name('rrss.side');

    Route::get('indicadores', [ResponsabilidadSocialController::class, 'indicadores'])
        ->name('rrss.indicadores');

    Route::get('indicador/{id}', [ResponsabilidadSocialController::class, 'indicador'])
        ->name('rrss.indicador');

    Route::get('/{id?}', [ResponsabilidadSocialController::class, 'index'])
        ->name('rrss.index');
});


//Sustentaciones de titulación
Route::prefix('titulos-profesionales')->group(function () {
    Route::get('/{id?}', [SustentacionController::class, 'index'])
        ->name('ttpp.index');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('storage/{file}', function ($file) {
    return Storage::response($file);
})->name('documentos');
