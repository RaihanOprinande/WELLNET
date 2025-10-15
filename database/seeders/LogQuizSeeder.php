<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TemaQuiz;
use App\Models\SoalQuiz;
use App\Models\LogQuiz;

class LogQuizSeeder extends Seeder
{
    public function run(): void
    {
        // ====== 0️⃣ Pastikan User Ada ======
        $user = User::first() ?? User::create([
            'name' => 'Khairal Satria',
            'email' => 'khairal@example.com',
            'password' => bcrypt('password'),
        ]);

        // ====== 1️⃣ Buat Tema Quiz ======
        $tema = TemaQuiz::create([
            'title' => 'Pengantar Literasi Digital',
            'topik' => 'Week 1',
            'materi_relevan' => 'Pengenalan konsep literasi digital dasar',
            'image' => 'default.jpg',
            'description' => 'Materi dasar untuk memahami literasi digital',
            'week' => 1,
        ]);

        // ====== 2️⃣ Buat Soal Quiz ======
        $soal = SoalQuiz::create([
            'temaquiz_id' => $tema->id,
            'pertanyaan' => 'Pernyataan “Semua informasi yang viral di media sosial sudah pasti benar dan terverifikasi.”',
            'jawaban_benar' => 'Mitos',
        ]);

        // ====== 3️⃣ Buat Beberapa Log Quiz Dummy ======
        for ($i = 1; $i <= 4; $i++) {
            LogQuiz::create([
                'user_id' => $user->id,
                'temaquiz_id' => $tema->id,
                'soalquiz_id' => $soal->id,
                'jawaban_user' => $i % 2 == 0 ? 'Fakta' : 'Mitos', // selang-seling contoh jawaban
            ]);
        }
    }
}
