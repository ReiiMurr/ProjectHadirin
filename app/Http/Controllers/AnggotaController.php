<?php
namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::orderBy('created_at', 'desc')->paginate(10);
        return view('indexanggota', compact('anggotas'));  // <- berubah
    }

    public function create()
    {
        return view('createanggota');  // <- berubah
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:anggotas,email',
            'no_hp' => 'required|string|max:20',
            'alamat'=> 'required|string',
        ]);

        Anggota::create($validated);

        return redirect()->route('anggota.index')
                         ->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function edit(Anggota $anggota)
    {
        return view('editanggota', compact('anggota'));  // <- berubah
    }

    public function update(Request $request, Anggota $anggota)
    {
        $validated = $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:anggotas,email,' . $anggota->id,
            'no_hp' => 'required|string|max:20',
            'alamat'=> 'required|string',
        ]);

        $anggota->update($validated);

        return redirect()->route('anggota.index')
                         ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota.index')
                         ->with('success', 'Data anggota berhasil dihapus.');
    }
}
