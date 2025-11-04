<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setting_id')->constrained('user_setting')->onDelete('cascade');
            $table->string('pelanggaran');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_pelanggaran');
    }
};
