<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek8Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'pertanyaan' => 'Manakah yang merupakan tanda Digital Wellbeing yang SEHAT?',
                'opsi' => [
                    'Merasa cemas jika tidak memeriksa notifikasi setiap 5 menit.',
                    'Mampu meletakkan ponsel saat sedang mengobrol langsung dengan teman atau keluarga.',
                    'Merasa perlu mengunggah setiap momen agar tidak ketinggalan.',
                    'Mengalami phantom vibration syndrome.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Menggunakan teknologi dengan tujuan yang jelas, sadar akan durasi, dan mengevaluasi dampaknya pada emosi disebut...',
                'opsi' => [
                    'Tech Savvy',
                    'Multitasking',
                    'Mindful Tech Use',
                    'Digital Literacy',
                ],
                'jawaban_index' => 2,
            ],
            [
                'pertanyaan' => 'Sebelum membuka aplikasi media sosial, pertanyaan apa yang bisa kamu ajukan pada diri sendiri untuk melatih mindfulness?',
                'opsi' => [
                    'Apa tujuan saya membuka aplikasi ini?',
                    'Apakah ini waktu terbaik untuk melakukannya?',
                    'Bagaimana perasaan saya setelahnya?',
                    'Semua benar.',
                ],
                'jawaban_index' => 3,
            ],
            [
                'pertanyaan' => '"Terlalu banyak screen time tidak memengaruhi kualitas tidur, asalkan kamu tidur cukup jam."',
                'opsi' => [
                    'Fakta',
                    'Mitos',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Tindakan yang paling efektif untuk meningkatkan keseimbangan digital dalam interaksi sosial?',
                'opsi' => [
                    'Menghabiskan lebih banyak waktu di media sosial.',
                    'Mengatur waktu khusus untuk bertemu langsung atau menelepon teman & keluarga tanpa gangguan ponsel.',
                    'Membalas semua komentar dengan cepat.',
                    'Mengunggah lebih banyak foto kegiatan sosial.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah dampak negatif dari penggunaan teknologi tanpa kesadaran?',
                'opsi' => [
                    'Peningkatan empati.',
                    'Penurunan kualitas tidur.',
                    'Peningkatan kontrol diri.',
                    'Peningkatan koneksi sosial luring.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah tindakan yang paling mendukung koneksi sosial luring (offline)?',
                'opsi' => [
                    'Mengirim pesan chat setiap hari ke teman.',
                    'Mengatur janji bertemu langsung atau aktivitas bersama tanpa gangguan ponsel.',
                    'Menghabiskan lebih banyak waktu di forum online.',
                    'Mengikuti semua akun teman di media sosial.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Bagaimana aplikasi mindfulness dapat membantu meningkatkan Digital Wellbeing?',
                'opsi' => [
                    'Meningkatkan jumlah followers.',
                    'Menurunkan distress psikologis dan meningkatkan kesadaran.',
                    'Membantu tidur lebih cepat tanpa usaha.',
                    'Membuat lebih pandai menggunakan ponsel.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Apa definisi dari Digital Wellbeing?',
                'opsi' => [
                    'Memiliki banyak perangkat digital.',
                    'Keseimbangan antara penggunaan teknologi dengan kesejahteraan mental, fisik, dan sosial.',
                    'Kemampuan selalu terhubung dengan internet.',
                    'Gaya hidup tanpa teknologi.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah yang BUKAN prinsip dasar dari Mindful Tech Use?',
                'opsi' => [
                    'Aware (Sadar sedang menggunakan teknologi).',
                    'Intentional (Penggunaan punya tujuan jelas).',
                    'Non-Reactive (Tidak impulsif atau FOMO).',
                    'Obsessive (Terus memikirkan teknologi).',
                ],
                'jawaban_index' => 3,
            ],
        ];

        foreach ($data as $item) {

            $soal = SoalQuiz::create([
                'temaquiz_id' => 8, // GANTI SESUAI KEBUTUHAN
                'pertanyaan' => $item['pertanyaan'],
                'jawaban_benar' => $item['opsi'][$item['jawaban_index']],
            ]);

            foreach ($item['opsi'] as $index => $opsiText) {
                OpsiSoal::create([
                    'soalquiz_id' => $soal->id,
                    'opsi' => $opsiText,
                    'is_correct' => $index == $item['jawaban_index'] ? 1 : 0,
                ]);
            }
        }
    }
}
