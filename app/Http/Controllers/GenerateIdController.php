<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateIdController extends Controller
{
    /**
     * Tampilkan halaman Generate ID Anggota beserta QR Code (SVG).
     */
    public function index()
    {
        // Ambil semua anggota (menggunakan paginate 20 per halaman)
        $anggotas = Anggota::orderBy('nama')->paginate(20);

        // Render view 'generate_id' (resources/views/generate_id.blade.php)
        return view('generate_id', compact('anggotas'));
    }

    /**
     * Download QR Code dalam format SVG (tidak butuh Imagick).
     */
    public function downloadQr($id)
    {
        $anggota = Anggota::findOrFail($id);
        $payload = $anggota->user_id ?? $anggota->id;

        // Generate QR Code sebagai SVG string (ukuran 300×300)
        $svgString = QrCode::format('svg')
                           ->size(300)
                           ->generate($payload);

        $filename = 'qr_anggota_' . ($anggota->user_id ?? $anggota->id) . '.svg';

        return response($svgString, 200, [
            'Content-Type'        => 'image/svg+xml',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
}
