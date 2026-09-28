<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Auth
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('students', StudentController::class);
Route::delete('/students/{student}', [StudentController::class, 'destroy'])
    ->middleware('auth:sanctum');
