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
        Schema::create('soal_quiz', function (Blueprint $table) {
            $table->id();
            $table->foreignId('temaquiz_id')->constrained('tema_quiz')->onDelete('cascade');
            $table->text('pertanyaan');
            $table->string('jawaban_benar');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal_quiz');
    }
};
