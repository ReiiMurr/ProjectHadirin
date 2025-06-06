@extends('layouts.app') {{-- Asumsikan Anda punya layout bernama layouts.app --}}

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Anggota</h4>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary">+ Tambah Anggota</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($anggotas as $index => $a)
                <tr>
                    <td>{{ $anggotas->firstItem() + $index }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->no_hp }}</td>
                    <td>{{ $a->alamat }}</td>
                    <td>
                        <a href="{{ route('anggota.edit', $a->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('anggota.destroy', $a->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus data anggota ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data anggota.</td>
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
