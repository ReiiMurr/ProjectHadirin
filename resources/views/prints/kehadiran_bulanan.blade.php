@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Judul dan Form Pilih Bulan --}}
    <h4 class="mb-3">Kehadiran Bulanan – {{ $month }}</h4>

    <form method="GET" action="{{ route('kehadiran.print_bulanan') }}" class="row g-2 mb-4">
        <div class="col-auto">
            <input
                type="month"
                name="bulan"
                class="form-control"
                value="{{ $month }}"
                required
            >
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </div>
    </form>

    {{-- Tabel Data Kehadiran Bulanan --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 40%;">Nama Anggota</th>
                <th style="width: 25%;">Tanggal Absen</th>
                <th style="width: 30%;">Waktu Absen</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataKehadiran as $index => $kehadiran)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kehadiran->anggota->nama }}</td>
                    <td>{{ $kehadiran->tanggal_absen }}</td>
                    <td>{{ \Carbon\Carbon::parse($kehadiran->waktu_absen)->format('H:i:s') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada data absensi di bulan ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
