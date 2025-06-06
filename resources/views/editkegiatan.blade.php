{{-- resources/views/editkegiatan.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Kegiatan')

@section('content')
<div class="container">
    <h4>Edit Kegiatan</h4>
    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('kegiatan.update', $kegiatan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input
                        type="text"
                        name="judul"
                        id="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $kegiatan->judul) }}"
                        required
                    >
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input
                        type="date"
                        name="tanggal"
                        id="tanggal"
                        class="form-control @error('tanggal') is-invalid @enderror"
                        value="{{ old('tanggal', $kegiatan->tanggal) }}"
                        required
                    >
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
