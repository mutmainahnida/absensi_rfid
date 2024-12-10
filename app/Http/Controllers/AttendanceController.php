<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Card;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $data = Attendance::latest()->take(10)->get();
        return view('attendance.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(['uid' => 'required|string', 'timestamp' => 'required|string']);
        $uid = $request->input('uid');
        $timestamp = $request->input('timestamp');

        $card = Card::where('uid', $uid)->first();

        // Simpan data absensi
        Attendance::create([
            'name' => $card->name ?? 'ID tidak dikenali', // Jika tidak ada nama, tampilkan 'ID tidak dikenali'
            'uid' => $uid,
            'created_at' => $timestamp,
        ]);

        return response()->json([
            'success' => true,
            'message' => $card ? 'UID ditemukan' : 'UID tidak dikenali',
            'data' => $card,
        ]);
    }

    public function getAttendanceData()
    {
        $data = Attendance::latest()->get();
        return response()->json($data);
    }
}
