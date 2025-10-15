<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_quiz', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('temaquiz_id')->constrained('tema_quiz')->onDelete('cascade');
            $table->foreignId('soalquiz_id')->constrained('soal_quiz')->onDelete('cascade');
            $table->string('jawaban_user')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_quiz');
    }
};
