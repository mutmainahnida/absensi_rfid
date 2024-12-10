<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/attendance', [AttendanceController::class, 'index']);
Route::post('/rfid-data', [AttendanceController::class, 'store']);
Route::resource('cards', CardController::class);