<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tema_quiz', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('materi_relevan')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('week')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tema_quiz');
    }
};
