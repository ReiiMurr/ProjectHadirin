<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenerateIdController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\PrintController;

Route::get('/', function () {
    return view('welcome');
});

// 1) Route khusus untuk Generate ID Anggota (harus di atas resource('anggota'))
Route::get('anggota/generate', [GenerateIdController::class, 'index'])
     ->name('anggota.generate');

// 2) Route untuk download QR Code (sekarang akan mengunduh file .svg)
Route::get('anggota/{id}/download-qr', [GenerateIdController::class, 'downloadQr'])
     ->name('anggota.download_qr');

// 3) Resource CRUD Anggota (kita exclude show() karena tidak dipakai)
Route::resource('anggota', AnggotaController::class)
     ->parameters(['anggota' => 'anggota'])
     ->except(['show']);

// 4) Resource CRUD Kegiatan
Route::resource('kegiatan', KegiatanController::class)
     ->parameters(['kegiatan' => 'kegiatan']);

     // 1) Halaman Scan QR Kehadiran
Route::get('scan-kehadiran', [KehadiranController::class, 'scanPage'])
     ->name('kehadiran.scan');

// 2) Endpoint AJAX untuk menyimpan absen (POST)
Route::post('scan-kehadiran', [KehadiranController::class, 'store'])
     ->name('kehadiran.store');

// 3) Halaman Print Kehadiran Harian (opsional)
Route::get('kehadiran/print-harian', [KehadiranController::class, 'printHarian'])
     ->name('kehadiran.print_harian');

// 4) Halaman Print Kehadiran Bulanan (opsional)
Route::get('kehadiran/print-bulanan', [KehadiranController::class, 'printBulanan'])
     ->name('kehadiran.print_bulanan');

// ...
Route::get('kehadiran/print-harian', [PrintController::class, 'kehadiranHarian'])
     ->name('kehadiran.print_harian');

Route::get('kehadiran/print-bulanan', [PrintController::class, 'kehadiranBulanan'])
     ->name('kehadiran.print_bulanan');
