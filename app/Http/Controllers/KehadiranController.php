<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Kehadiran;
use Carbon\Carbon;

class KehadiranController extends Controller
{
    /**
     * Menampilkan halaman scan QR untuk absensi.
     * Route: GET /scan-kehadiran
     */
    public function scanPage()
    {
        // Pastikan Anda memiliki view: resources/views/scan_kehadiran.blade.php
        return view('scan_kehadiran');
    }

    /**
     * Menangani request AJAX saat QR terbaca, lalu simpan kehadiran ke database.
     * Route: POST /scan-kehadiran
     */
    public function store(Request $request)
    {
        // Ambil payload (bisa user_id atau id)
        $payload = $request->input('user_id');

        if (!$payload) {
            return response()->json([
                'status'  => 'error',
                'message' => 'User ID tidak diterima.'
            ], 422);
        }

        // Coba cari berdasarkan kolom user_id
        $anggota = Anggota::where('user_id', $payload)->first();

        // Jika belum ketemu dan payload numeric, coba cari berdasarkan primary key (id)
        if (!$anggota && is_numeric($payload)) {
            $anggota = Anggota::find((int) $payload);
        }

        // Jika tetap belum ketemu, kirim error
        if (!$anggota) {
            return response()->json([
                'status'  => 'error',
                'message' => 'User ID tidak valid.'
            ], 404);
        }

        // Cek apakah sudah absen hari ini
        $today = Carbon::today()->toDateString();
        $sudahAbsen = Kehadiran::where('anggota_id', $anggota->id)
            ->where('tanggal_absen', $today)
            ->exists();

        if ($sudahAbsen) {
            return response()->json([
                'status'  => 'duplicate',
                'message' => 'Anda sudah melakukan absensi hari ini.'
            ]);
        }

        // Simpan kehadiran baru
        $now = Carbon::now();
        Kehadiran::create([
            'anggota_id'    => $anggota->id,
            'waktu_absen'   => $now,
            'tanggal_absen' => $now->toDateString(),
        ]);

        return response()->json([
            'status'       => 'success',
            'nama'         => $anggota->nama,
            'waktu_absen'  => $now->format('H:i:s'),
            'tanggal_absen'=> $now->toDateString(),
        ]);
    }

    /**
     * Menampilkan halaman Print Kehadiran Harian.
     * Route: GET /kehadiran/print-harian
     */
    public function printHarian(Request $request)
    {
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());
        $dataKehadiran = Kehadiran::with('anggota')
            ->where('tanggal_absen', $tanggal)
            ->orderBy('waktu_absen', 'asc')
            ->get();

        return view('prints.kehadiran_harian', compact('tanggal', 'dataKehadiran'));
    }

    /**
     * Menampilkan halaman Print Kehadiran Bulanan.
     * Route: GET /kehadiran/print-bulanan
     */
    public function printBulanan(Request $request)
    {
        $month = $request->input('bulan', Carbon::now()->format('Y-m'));
        $dataKehadiran = Kehadiran::with('anggota')
            ->where('tanggal_absen', 'LIKE', $month . '%')
            ->orderBy('tanggal_absen', 'asc')
            ->orderBy('waktu_absen', 'asc')
            ->get();

        return view('prints.kehadiran_bulanan', compact('month', 'dataKehadiran'));
    }
}
