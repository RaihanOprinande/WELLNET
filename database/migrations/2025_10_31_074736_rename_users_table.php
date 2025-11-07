<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ubah 'nama_kolom_lama' menjadi 'nama_kolom_baru'
            $table->renameColumn('name', 'username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Balikkan perubahan: Ubah 'nama_kolom_baru' kembali menjadi 'nama_kolom_lama'
            $table->renameColumn('username', 'name');
        });
    }
};
