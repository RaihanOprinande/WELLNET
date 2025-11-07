<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('soal_quiz', function (Blueprint $table) {
            // Ubah kolom pertanyaan menjadi text dan boleh null
            $table->text('pertanyaan')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('soal_quiz', function (Blueprint $table) {
            // Kembalikan ke varchar(255) jika dibatalkan
            $table->string('pertanyaan', 255)->nullable()->change();
        });
    }
};
