@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Kehadiran Harian – {{ $tanggal }}</h4>

    <form method="GET" action="{{ route('kehadiran.print_harian') }}" class="row g-2 mb-4">
        <div class="col-auto">
            <input type="date" name="tanggal" class="form-control" value="{{ $tanggal }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Anggota</th>
                <th>Waktu Absen</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataKehadiran as $index => $kehadiran)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kehadiran->anggota->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($kehadiran->waktu_absen)->format('H:i:s') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data absen pada tanggal ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
