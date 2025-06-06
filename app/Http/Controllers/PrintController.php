<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;
use Carbon\Carbon;

class PrintController extends Controller
{
    /**
     * Tampilkan data Kehadiran Harian.
     * URL: GET /kehadiran/print-harian?tanggal=YYYY-MM-DD
     */
    public function kehadiranHarian(Request $request)
    {
        // Ambil tanggal dari query string, default = hari ini (YYYY-MM-DD)
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());

        // Query data kehadiran di tanggal tersebut (urut menurut jam absen)
        $dataKehadiran = Kehadiran::with('anggota')
            ->where('tanggal_absen', $tanggal)
            ->orderBy('waktu_absen', 'asc')
            ->get();

        // Kirim ke view 'prints.kehadiran_harian' variabel: $tanggal, $dataKehadiran
        return view('prints.kehadiran_harian', compact('tanggal', 'dataKehadiran'));
    }

    /**
     * Tampilkan data Kehadiran Bulanan.
     * URL: GET /kehadiran/print-bulanan?bulan=YYYY-MM
     */
    public function kehadiranBulanan(Request $request)
    {
        // Ambil bulan dari query string (format YYYY-MM), default = bulan sekarang
        $month = $request->input('bulan', Carbon::now()->format('Y-m'));

        // Query data kehadiran di bulan tersebut (tanggal_absen LIKE 'YYYY-MM%')
        $dataKehadiran = Kehadiran::with('anggota')
            ->where('tanggal_absen', 'LIKE', $month . '%')
            ->orderBy('tanggal_absen', 'asc')
            ->orderBy('waktu_absen', 'asc')
            ->get();

        // Kirim ke view 'prints.kehadiran_bulanan' variabel: $month, $dataKehadiran
        return view('prints.kehadiran_bulanan', compact('month', 'dataKehadiran'));
    }
}
