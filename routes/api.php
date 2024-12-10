<?php

use App\Http\Controllers\AttendanceController;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/rfid-data', function (Request $request) {
    // Validasi data yang diterima
    $request->validate([
        'uid' => 'required|string|max:255', // Pastikan UID ada dan berupa string
    ]);
    
    $uid = $request->input('uid');
    
    // Cek apakah UID ada dalam database
    $card = \App\Models\Card::where('uid', $uid)->first();

    // Jika UID tidak ditemukan
    if (!$card) {
        return response()->json(['message' => 'UID tidak dikenali'], 404);
    }

    // Simpan data absensi
    $attendance = Attendance::create([
        'uid' => $uid,
        'name' => $card->name,  // Ambil nama dari data card
        'timestamp' => now(),
    ]);

    return response()->json([
        'message' => 'UID diterima',
        'uid' => $uid,
        'name' => $card->name,
        'timestamp' => $attendance->timestamp->toDateTimeString(),
    ]);
});

Route::get('/attendance-data', [AttendanceController::class, 'getAttendanceData']);
