<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel untuk menyimpan limit per aplikasi
        Schema::create('app_limits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('package_name'); // com.instagram.android
            $table->string('app_name'); // Instagram
            $table->enum('category', ['Social', 'Entertainment', 'Education', 'Others'])->default('Others');
            $table->integer('limit_minutes'); // Limit harian dalam menit
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['user_id', 'package_name']);
        });

        // Tabel untuk tracking penggunaan per aplikasi harian
        Schema::create('app_usage_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('app_limit_id')->nullable()->constrained('app_limits')->onDelete('set null');
            $table->string('package_name');
            $table->string('app_name');
            $table->date('usage_date');
            $table->integer('used_minutes')->default(0); // Total menit hari ini
            $table->boolean('limit_exceeded')->default(false);
            $table->timestamp('last_synced_at')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'package_name', 'usage_date']);
        });

        // Tabel untuk tracking pelanggaran
        Schema::create('violations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('type', ['downtime', 'app_limit', 'sleep_schedule', 'digital_freetime', 'nlp_toxicity']);
            $table->string('details')->nullable(); // JSON string dengan info detail
            $table->integer('severity')->default(1); // 1=ringan, 2=sedang, 3=berat
            $table->integer('points_deducted')->default(0);
            $table->timestamp('occurred_at');
            $table->timestamps();

            $table->index(['user_id', 'type', 'occurred_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('violations');
        Schema::dropIfExists('app_usage_logs');
        Schema::dropIfExists('app_limits');
    }
};