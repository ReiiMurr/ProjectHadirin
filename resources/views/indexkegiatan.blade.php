@extends('layouts.app')

@section('title', 'Daftar Kegiatan')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Kegiatan</h4>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">+ Tambah Kegiatan</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kegiatans as $index => $k)
                <tr>
                    <td>{{ $kegiatans->firstItem() + $index }}</td>
                    <td>{{ $k->judul }}</td>
                    <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('kegiatan.edit', $k) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('kegiatan.destroy', $k) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus kegiatan ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data kegiatan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $kegiatans->links() }}
    </div>
</div>
@endsection
