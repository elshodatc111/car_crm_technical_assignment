<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;

Route::get('/cars', [CarController::class, 'index']);
Route::post('/cars', [CarController::class, 'store']);

Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/cars/{id}/bookings', [BookingController::class, 'index']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);