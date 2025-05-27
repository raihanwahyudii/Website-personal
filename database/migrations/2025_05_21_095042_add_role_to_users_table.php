<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ubah kolom 'role' pada tabel 'users' jadi panjang 20 karakter.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 20)->change();
        });
    }

    /**
     * Kembalikan kolom 'role' ke panjang 4 karakter.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 4)->change();
        });
    }
};
