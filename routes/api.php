<?php

use App\Http\Controllers\Api\NfcApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ruta no protegida Route::post('/registro-asistencia', [NfcApiController::class, 'registrar']);
// reemplazada por ruta corregida para API
Route::middleware('verify.apikey')->group(function () {
    Route::post('/registro-asistencia', [NfcApiController::class, 'registrar']);
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
