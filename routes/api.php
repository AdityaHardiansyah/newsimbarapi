<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\AuthController;


Route::get('/test', function () {
    return ['message' => 'API OK'];
});

Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/{id}', [PegawaiController::class, 'show']);
Route::post('/pegawai', [PegawaiController::class, 'store']);
Route::put('/pegawai/{id}', [PegawaiController::class, 'update']);
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy']);


Route::get('/spp', [SppController::class, 'index']);
Route::get('/spp/{id}', [SppController::class, 'show']);
Route::post('/spp', [SppController::class, 'store']);
Route::put('/spp/{id}', [SppController::class, 'update']);
Route::delete('/spp/{id}', [SppController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
