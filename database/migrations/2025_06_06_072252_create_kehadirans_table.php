<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anggota_id');
            $table->dateTime('waktu_absen');   // tanggal + jam absen
            $table->date('tanggal_absen');     // hanya tanggal (untuk query harian)
            $table->timestamps();

            $table->foreign('anggota_id')
                  ->references('id')->on('anggotas')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kehadirans');
    }
};
