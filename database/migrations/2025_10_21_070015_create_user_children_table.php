<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_children');
    }
};
