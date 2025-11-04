<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LogQuiz;
use App\Models\LogPelanggaran;
use App\Models\UserSetting;
use App\Models\TemaQuiz;
use App\Models\SoalQuiz;

class LogQuizAndPelanggaranSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil satu data setting (pastikan sudah ada user_setting, tema_quiz, dan soal_quiz di database)
        $setting = UserSetting::first();
        $tema = TemaQuiz::first();
        $soal = SoalQuiz::first();

        if (!$setting || !$tema || !$soal) {
            $this->command->warn('⚠️ Data referensi belum ada. Pastikan user_setting, tema_quiz, dan soal_quiz sudah terisi.');
            return;
        }

        // === LOG QUIZ ===
        LogQuiz::create([
            'setting_id' => $setting->id,
            'temaquiz_id' => $tema->id,
            'soalquiz_id' => $soal->id,
            'jawaban_user' => 'A',
        ]);

        LogQuiz::create([
            'setting_id' => $setting->id,
            'temaquiz_id' => $tema->id,
            'soalquiz_id' => $soal->id,
            'jawaban_user' => 'B',
        ]);

        // === LOG PELANGGARAN ===
        LogPelanggaran::create([
            'setting_id' => $setting->id,
            'pelanggaran' => 'Screen Time Melebihi Batas',
        ]);

        LogPelanggaran::create([
            'setting_id' => $setting->id,
            'pelanggaran' => 'Tidak Mengikuti Jadwal Tidur',
        ]);

        $this->command->info('✅ Seeder LogQuizAndPelanggaranSeeder berhasil dijalankan!');
    }
}
