<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('registro', [RegistroController::class, 'index'])->name('registro');

Route::get('actividades', [ActividadController::class, 'index'])->name('actividad.actividades');

Route::get('mis-actividades/{id}/{ciclo}', [ActividadController::class, 'show'])->name('actividad.mis-actividades');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('storage/{file}', function ($file) {
    return Storage::response($file);
})->name('documentos');
