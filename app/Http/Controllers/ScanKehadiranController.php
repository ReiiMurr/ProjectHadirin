<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Kehadiran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ScanKehadiranController extends Controller
{
    /**
     * Tampilkan halaman scan QR anggota. 
     * View: resources/views/scan_kehadiran.blade.php
     */
    public function index()
    {
        return view('scan_kehadiran');
    }

    /**
     * Terima data hasil scan (user_id) via AJAX, 
     * catat ke tabel kehadirans jika valid.
     */
    public function store(Request $request)
    {
        // Validasi: harus ada 'user_id' di request
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|exists:anggotas,user_id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'User ID tidak valid atau anggota tidak terdaftar.'
            ], 422);
        }

        $user_id = $request->input('user_id');

        // Cari objek Anggota berdasarkan user_id
        $anggota = Anggota::where('user_id', $user_id)->first();
        if (!$anggota) {
            // Kondisi ini seharusnya tidak terjadi jika 'exists' tadi berjalan
            return response()->json([
                'status'  => 'error',
                'message' => 'Anggota dengan User ID tersebut tidak ditemukan.'
            ], 404);
        }

        // Periksa apakah anggota ini sudah absen hari ini
        $today = Carbon::today()->toDateString(); // e.g. "2025-06-06"
        $sudahAbsen = Kehadiran::where('anggota_id', $anggota->id)
                        ->where('tanggal_absen', $today)
                        ->exists();

        if ($sudahAbsen) {
            return response()->json([
                'status'  => 'duplicate',
                'message' => 'Anda sudah melakukan absensi hari ini.'
            ]);
        }

        // Simpan kehadiran: waktu sekarang
        $now = Carbon::now();
        Kehadiran::create([
            'anggota_id'   => $anggota->id,
            'waktu_absen'  => $now,
            'tanggal_absen'=> $now->toDateString(),
        ]);

        return response()->json([
            'status'       => 'success',
            'message'      => 'Absensi berhasil dicatat.',
            'nama'         => $anggota->nama,
            'waktu_absen'  => $now->format('H:i:s'),
            'tanggal_absen'=> $now->toDateString(),
        ]);
    }
}
