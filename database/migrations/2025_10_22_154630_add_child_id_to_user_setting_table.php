<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_setting', function (Blueprint $table) {
            $table->unsignedBigInteger('child_id')->nullable()->after('user_id');
            $table->foreign('child_id')->references('id')->on('user_children')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('user_setting', function (Blueprint $table) {
            $table->dropForeign(['child_id']);
            $table->dropColumn('child_id');
        });
    }
};
