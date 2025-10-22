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
        Schema::create('user_setting', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->integer('umur')->nullable();
            $table->integer('skor')->default(0);
            $table->enum('lencana', [
                'Seedling',
                'Sprout',
                'Explorer',
                'Trailblazer',
                'Mountaineer',
                'Skywalker',
                'Digital Sage'
            ])->default('Seedling');
            $table->integer('downtime')->nullable(); // menit total downtime
            $table->time('sleep_schedule_start')->nullable();
            $table->time('sleep_schedule_end')->nullable();
            $table->time('digital_freetime_start')->nullable();
            $table->time('digital_freetime_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_setting');
    }
};
