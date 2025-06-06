{{-- resources/views/generate_id.blade.php --}}
@extends('layouts.app')

@php
    // Import facade QrCode agar bisa digunakan di Blade
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Generate ID Anggota</h4>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">← Kembali ke Daftar Anggota</a>
    </div>

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>User ID</th>
                <th>QR Code</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($anggotas as $index => $a)
                <tr>
                    <td>{{ $anggotas->firstItem() + $index }}</td>
                    <td>{{ $a->nama }}</td>
                    {{-- Jika ada kolom user_id, pakai $a->user_id; kalau tidak, pakai $a->id --}}
                    <td>{{ $a->user_id ?? $a->id }}</td>
                    <td>
                        {{-- Tampilkan QR Code di halaman (dibentuk sebagai elemen <svg>) --}}
                        {!! QrCode::size(100)->generate($a->user_id ?? $a->id) !!}
                    </td>
                    <td>
                        {{-- Link download sekarang akan mengunduh file .svg --}}
                        <a href="{{ route('anggota.download_qr', $a->id) }}"
                           class="btn btn-sm btn-primary">
                            Download QR
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada anggota terdaftar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $anggotas->links() }}
    </div>
</div>
@endsection
