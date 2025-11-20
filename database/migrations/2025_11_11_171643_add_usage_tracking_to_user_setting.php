<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_setting', function (Blueprint $table) {
            $table->integer('used_minutes_today')->default(0)->after('downtime');
            $table->date('last_reset_date')->nullable()->after('used_minutes_today');
            $table->timestamp('current_session_start')->nullable()->after('last_reset_date');
        });
    }

    public function down(): void
    {
        Schema::table('user_setting', function (Blueprint $table) {
            $table->dropColumn('used_minutes_today');
            $table->dropColumn('last_reset_date');
            $table->dropColumn('current_session_start');
        });
    }
};
