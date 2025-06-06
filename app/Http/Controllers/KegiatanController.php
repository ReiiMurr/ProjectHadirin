<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua kegiatan, urut terbaru di atas
        $kegiatans = Kegiatan::orderBy('tanggal', 'desc')->paginate(10);
        return view('indexkegiatan', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createkegiatan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'   => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        Kegiatan::create($validated);

        return redirect()->route('kegiatan.index')
                         ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('editkegiatan', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'judul'   => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $kegiatan->update($validated);

        return redirect()->route('kegiatan.index')
                         ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
                         ->with('success', 'Kegiatan berhasil dihapus.');
    }
}
