<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $fillable = [
        'anggota_id',
        'waktu_absen',
        'tanggal_absen',
    ];

    /**
     * Relasi: Kehadiran milik satu Anggota.
     */
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
