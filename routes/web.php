<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DispositivosNfcController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ReporteExportController;
use Illuminate\Support\Facades\Route;

// Estudiantes
Route::resource('estudiantes', EstudianteController::class);

// Docentes
Route::resource('docentes', DocenteController::class);

// aulas
Route::resource('aulas', AulaController::class);

// materias
Route::resource('materias', MateriaController::class);

// cursos
Route::resource('cursos', CursoController::class);

// horarios
Route::resource('horarios', HorarioController::class);

// dispositivos
Route::resource('dispositivos-nfcs', DispositivosNfcController::class);

// asistencias
Route::resource('asistencias', AsistenciaController::class);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// reportes
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');

// reportes excel y pdf
Route::get('/reportes/excel', [ReporteExportController::class, 'exportExcel'])->name('reportes.excel');
Route::get('/reportes/pdf', [ReporteExportController::class, 'exportPDF'])->name('reportes.pdf');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
