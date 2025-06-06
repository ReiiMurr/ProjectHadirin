<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'alamat',
        'user_id',
        // ... kolom lainnya jika ada
    ];

    /**
     * Relasi: satu Anggota dapat memiliki banyak Kehadiran.
     */
    public function kehadirans()
    {
        return $this->hasMany(Kehadiran::class);
    }
}
