<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek12Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'pertanyaan' => 'Dari semua topik selama 11 minggu, manakah yang paling membuka wawasanmu dan mengubah caramu berperilaku di dunia digital?',
                'opsi' => [
                    'Privasi & Keamanan Data',              // A
                    'Hoax & Disinformasi',                 // B
                    'Digital Detox & Mindfulness',         // C
                    'Semua topik memiliki dampak yang sama.' // D ✔
                ],
                'jawaban_index' => 3,
            ],
            [
                'pertanyaan' => 'Manakah kebiasaan digital sehat yang paling realistis dan akan kamu pertahankan atau mulai terapkan setelah menyelesaikan tantangan Wellnet ini?',
                'opsi' => [
                    'Tidak akan pernah menyentuh ponsel lagi.',               // A
                    'Mengurangi screen time harian dan lebih banyak berinteraksi offline.', // B ✔
                    'Mengunggah lebih banyak foto agar terlihat aktif.',      // C
                    'Membeli semua gadget terbaru di pasaran.',               // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Bagaimana kamu akan menggunakan pengetahuan dari Wellnet untuk membantu teman atau keluargamu menjadi lebih bijak di dunia digital?',
                'opsi' => [
                    'Menggurui mereka setiap kali membuat kesalahan.',                                      // A
                    'Berbagi tips relevan dengan santai dan suportif saat ada kesempatan.',                // B ✔
                    'Tidak melakukan apa-apa karena itu urusan mereka.',                                   // C
                    'Mengkritik pilihan digital mereka di depan umum.',                                    // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => '"Refleksi diri tentang kebiasaan digital hanya perlu dilakukan di awal dan akhir program, tidak perlu sering-sering."',
                'opsi' => [
                    'Fakta',  // A
                    'Mitos',  // B ✔
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Jika kamu bisa memberikan satu nasihat terbaik kepada pengguna Wellnet yang baru memulai perjalanan mereka, apa nasihat itu?',
                'opsi' => [
                    '"Jangan pernah percaya apa pun di internet."',                                   // A
                    '"Nikmati setiap tantangan, dan ingat bahwa keseimbangan digital itu mungkin!"',  // B ✔
                    '"Cukup ikuti semua tren tanpa berpikir."',                                      // C
                    '"Semakin banyak screen time, semakin baik."',                                   // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Apa manfaat utama dari merefleksikan perjalanan kesejahteraan digitalmu?',
                'opsi' => [
                    'Agar bisa membandingkan diri dengan orang lain.',                                           // A
                    'Untuk mengidentifikasi kemajuan, area yang perlu ditingkatkan, dan membuat tujuan baru.',   // B ✔
                    'Untuk mengetahui siapa yang paling aktif di Wellnet.',                                      // C
                    'Untuk mendapatkan lebih banyak poin hadiah.',                                               // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah indikator terbaik bahwa kamu telah mencapai keseimbangan digital yang sehat?',
                'opsi' => [
                    'Kamu tidak lagi menggunakan ponsel.',                                                   // A
                    'Kamu merasa tenang dan hadir saat tidak menggunakan ponsel, dan penggunaanmu terarah.', // B ✔
                    'Memiliki followers yang banyak di media sosial.',                                      // C
                    'Multitasking dengan ponsel saat berinteraksi luring.',                                // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Bagaimana Wellnet membantumu dalam perjalanan kesejahteraan digital ini?',
                'opsi' => [
                    'Dengan membatasi aksesmu ke internet.',                                                // A
                    'Dengan memberikan edukasi, tantangan, dan alat untuk kebiasaan digital sehat.',        // B ✔
                    'Dengan membuatmu merasa bersalah setiap kali menggunakan ponsel.',                     // C
                    'Dengan membuatmu terus bermain kuis.',                                                  // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Apa dampak jangka panjang dari memiliki cyber wellness yang baik dan melakukan digital detox secara teratur?',
                'opsi' => [
                    'Kamu akan lebih sering menggunakan ponsel.',                           // A
                    'Peningkatan kesehatan mental, tidur lebih baik, dan hubungan sosial.', // B ✔
                    'Menjadi rentan terhadap hoax.',                                       // C
                    'Tidak bisa mengikuti perkembangan teknologi.',                         // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Setelah menyelesaikan 12 minggu tantangan ini, apakah perjalanan kesejahteraan digitalmu sudah berakhir?',
                'opsi' => [
                    'Ya, sudah selesai.',                                                             // A
                    'Tidak, ini perjalanan seumur hidup yang memerlukan adaptasi berkelanjutan.',     // B ✔
                    'Hanya jika kamu tidak pernah menggunakan ponsel lagi.',                           // C
                    'Hanya jika teman-temanmu juga melakukan digital detox.',                         // D
                ],
                'jawaban_index' => 1,
            ],
        ];

        foreach ($data as $item) {

            $soal = SoalQuiz::create([
                'temaquiz_id' => 12, // sesuaikan ID tema week 12
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
