<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            // Tambahkan kolom user_id, bertipe string dan unik, boleh null (sementara)
            $table->string('user_id')->unique()->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            // Jika rollback, buang kolom user_id
            $table->dropColumn('user_id');
        });
    }
};
