<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
use App\Http\Controllers\Api\AttendanceController;

// Endpoint untuk menerima lemparan data scan dari Flutter
Route::post('/scan-qr', [AttendanceController::class, 'scan']);
use App\Http\Controllers\Api\AuthController;

// Endpoint untuk Login aplikasi HP
Route::post('/login', [AuthController::class, 'login']);