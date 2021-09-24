<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\BachillerController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\InvestigacionController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ResponsabilidadSocialController;
use App\Http\Controllers\SustentacionController;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Http;

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
        $estudiante = \App\Models\Estudiante::find(5);
        return view('rrss.my-side', compact('estudiante'));
    })->name('rrss.side');

    Route::get('indicadores', [ResponsabilidadSocialController::class, 'indicadores'])
        ->name('rrss.indicadores');

    Route::get('/{id?}', [ResponsabilidadSocialController::class, 'index'])
        ->name('rrss.index');
});

Route::prefix('investigacion')->group(function () {
    Route::get('/', [InvestigacionController::class, 'index'])
        ->name('investigacion.index');
    Route::get('investigadores', [InvestigacionController::class, 'investigadores'])
        ->name('investigacion.investigadores');

    Route::get('indicadores', [InvestigacionController::class, 'indicadores'])
        ->name('investigacion.indicadores');
    Route::get('/{id}', [InvestigacionController::class, 'mostrar'])
        ->name('investigacion.mostrar');
});

Route::prefix('indicadores')->group(function () {
    Route::get('/', [IndicadorController::class, 'index'])
        ->name('indicadores.index');
    Route::get('procesos/{id}/{nombre}', [IndicadorController::class, 'indicadores'])
        ->name('indicadores.indicadores');
    Route::get('{id}/{nombre}', [IndicadorController::class, 'indicador'])
        ->name('indicadores.indicador');
});

Route::prefix('bachiller')->group(function () {
    Route::get('/', [BachillerController::class, 'index'])
        ->name('bachiller.index');
    Route::get('constancia/{sha}', [BachillerController::class, 'constancia'])
        ->name('bachiller.constancia');
    Route::get('estudiante/{sha}', [BachillerController::class, 'estudiante'])
        ->name('bachiller.estudiante');
});

//Sustentaciones de titulación
Route::prefix('titulos-profesionales')->group(function () {

    Route::get('crear', [SustentacionController::class, 'registro'])
        ->name('ttpp.registro');

    Route::get('/{id?}', [SustentacionController::class, 'index'])
        ->name('ttpp.index');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('storage/{file}', function ($file) {
    return Storage::response($file);
})->name('documentos');

Route::prefix('encuestas')->group(function () {
    Route::get('/rsu/{sha}', [EncuestaController::class, 'rrss'])
        ->name('encuesta.rrss');
    Route::get('/agradecimiento', [EncuestaController::class, 'agradecimiento'])
        ->name('encuesta.agradecimiento');
});

Route::get('pdf', function () {
    $pdf = PDF::loadView('pruebapdf');
//    return $pdf->download('invoice.pdf');
    return $pdf->stream();
});
