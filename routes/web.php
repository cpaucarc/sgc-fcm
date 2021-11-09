<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BachillerController;
use App\Http\Controllers\ConvalidacionController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\InvestigacionController;
use App\Http\Controllers\PlanEstudiosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ResponsabilidadSocialController;
use App\Http\Controllers\SustentacionController;
use App\Http\Controllers\TituloProfesionalController;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('registro', [RegistroController::class, 'index'])->name('registro');

Route::prefix('actividades')->group(function () {
    Route::get('/', [ActividadController::class, 'index'])
        ->name('actividad.actividades');

    Route::get('{id}/{ciclo}', [ActividadController::class, 'show'])
        ->name('actividad.mis-actividades');
});

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

Route::prefix('admin')->group(function () {
    Route::get('usuarios', [AdminController::class, 'usuarios'])
        ->name('admin.usuarios');
    Route::get('usuarios/{id}', [AdminController::class, 'modificar_usuario'])
        ->name('admin.usuario');
    Route::get('entidades', [AdminController::class, 'entidades'])
        ->name('admin.entidades');
    Route::get('entidades/{id}', [AdminController::class, 'entidad'])
        ->name('admin.entidad');
    Route::get('otros', [AdminController::class, 'otros'])
        ->name('admin.otros');
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
    Route::get('solicitudes', [BachillerController::class, 'solicitudes'])
        ->name('bachiller.solicitudes');
    Route::get('solicitud', [BachillerController::class, 'solicitud'])
        ->name('bachiller.solicitud');
    Route::get('constancia/{sha}', [BachillerController::class, 'constancia'])
        ->name('bachiller.constancia');
    Route::get('estudiante/{sha}', [BachillerController::class, 'estudiante'])
        ->name('bachiller.estudiante');
});

//Titulos profesionales
Route::prefix('titulos-profesionales')->group(function () {
    Route::get('crear', [SustentacionController::class, 'registro'])
        ->name('ttpp.registro');
    Route::get('titulados/{id?}', [SustentacionController::class, 'titulados'])
        ->name('ttpp.titulados');
    Route::get('asesores/{id?}', [SustentacionController::class, 'asesores'])
        ->name('ttpp.asesores');
    Route::get('solicitudes', [TituloProfesionalController::class, 'solicitudes'])
        ->name('ttpp.solicitudes');
    Route::get('solicitud', [TituloProfesionalController::class, 'solicitud'])
        ->name('ttpp.solicitud');
    Route::get('/{id?}', [SustentacionController::class, 'index'])
        ->name('ttpp.index');
    Route::get('constancia/{sha}', [TituloProfesionalController::class, 'constancia'])
        ->name('ttpp.constancia');
    Route::get('estudiante/{sha}', [TituloProfesionalController::class, 'estudiante'])
        ->name('ttpp.estudiante');
});

// Convalidaciones
Route::prefix('convalidacion')->group(function () {
    Route::get('/', [ConvalidacionController::class, 'index'])
        ->name('convalidacion.index');
    Route::get('solicitudes', [ConvalidacionController::class, 'solicitudes'])
        ->name('convalidacion.solicitudes');
    Route::get('solicitud', [ConvalidacionController::class, 'solicitud'])
        ->name('convalidacion.solicitud');
});

Route::prefix('plan_estudios')->group(function () {
    Route::get('/', [PlanEstudiosController::class, 'index'])
        ->name('plan_estudios.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Para mostrar archivos subidos al servidor
Route::get('storage/{file}', function ($file) {
    return Storage::response($file);
})->name('documentos');

//Para mostrar encuestas de RSU
Route::prefix('encuestas')->group(function () {
    Route::get('/rsu/{sha}', [EncuestaController::class, 'rrss'])
        ->name('encuesta.rrss');
    Route::get('/agradecimiento', [EncuestaController::class, 'agradecimiento'])
        ->name('encuesta.agradecimiento');
});

//Para mostrar PDF creados
Route::get('pdf', function () {
    $pdf = PDF::loadView('pruebapdf');
    //    return $pdf->download('invoice.pdf');
    return $pdf->stream();
});
