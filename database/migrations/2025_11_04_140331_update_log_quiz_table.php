<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('log_quiz', function (Blueprint $table) {
            // Hapus foreign key dan kolom user_id lama
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // Tambahkan kolom setting_id baru
            $table->foreignId('setting_id')
                  ->after('id')
                  ->constrained('user_setting')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('log_quiz', function (Blueprint $table) {
            // Balikkan perubahan
            $table->dropForeign(['setting_id']);
            $table->dropColumn('setting_id');

            // Kembalikan kolom user_id
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');
        });
    }
};
