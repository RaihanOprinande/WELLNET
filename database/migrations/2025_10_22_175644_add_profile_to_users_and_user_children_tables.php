<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile')->nullable()->after('email');
        });

        Schema::table('user_children', function (Blueprint $table) {
            $table->string('profile')->nullable()->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile');
        });

        Schema::table('user_children', function (Blueprint $table) {
            $table->dropColumn('profile');
        });
    }
};
