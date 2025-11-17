<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek10Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'pertanyaan' => 'Hak untuk mengontrol informasi tentang diri kita yang dibagikan dan digunakan oleh pihak lain disebut...',
                'opsi' => [
                    'Hak Berpendapat',          // A
                    'Hak Privasi Data',         // B ✔
                    'Hak Akses Internet',       // C
                    'Hak Cipta Konten',         // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Mengapa tindakanmu membagikan data (misal: ikut kuis kepribadian di Facebook) bisa membocorkan privasi teman-temanmu juga?',
                'opsi' => [
                    'Karena temanmu akan iri.',                                                                               // A
                    'Karena algoritma bisa memprediksi info tentang temanmu dari data dan jaringan sosialmu.',                 // B ✔
                    'Karena Facebook akan otomatis menandai teman-temanmu.',                                                   // C
                    'Karena temanmu bisa melihat aktivitasmu.',                                                                // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Temanmu mengirimkan foto memalukan orang lain di grup chat. Apa tindakan yang paling beretika?',
                'opsi' => [
                    'Meneruskan foto itu ke teman lain karena lucu.',                                                          // A
                    'Menegur temanmu secara pribadi dan meminta foto itu dihapus, serta tidak ikut menyebarkannya.',           // B ✔
                    'Keluar dari grup chat tersebut.',                                                                          // C
                    'Mengabaikan saja karena itu bukan fotomu.',                                                                // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => '"Selama kamu tidak mengunggah data pribadi, privasimu di internet sudah 100% aman."',
                'opsi' => [
                    'Fakta',       // A
                    'Mitos',       // B ✔
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah contoh tindakan yang paling mencerminkan upaya meningkatkan kesadaran tentang hak digital di lingkunganmu?',
                'opsi' => [
                    'Mengunggah semua data pribadimu agar orang lain melihatnya.',                                                 // A
                    'Berbagi informasi edukasi tentang keamanan siber dan privasi kepada teman atau keluarga.',                    // B ✔
                    'Mengabaikan semua notifikasi privasi dari aplikasi.',                                                         // C
                    'Mengkritik orang lain yang tidak peduli privasi.',                                                            // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Apa itu Netiquette?',
                'opsi' => [
                    'Aturan pemerintah tentang penggunaan internet.',                             // A
                    'Perangkat norma sosial digital yang mengatur perilaku dalam komunikasi daring.', // B ✔
                    'Etika saat bermain game online.',                                              // C
                    'Cara menggunakan internet dengan cepat.',                                      // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Mengapa penting untuk memahami etika digital?',
                'opsi' => [
                    'Agar tidak ketinggalan tren.',                                                   // A
                    'Untuk membangun komunikasi yang sehat dan menjaga reputasi online.',             // B ✔
                    'Agar bisa mendapatkan banyak followers.',                                         // C
                    'Untuk bisa mengkritik orang lain.',                                               // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah contoh perilaku berikut yang melanggar etika digital?',
                'opsi' => [
                    'Menjawab pesan chat dengan sopan.',                       // A
                    'Menyebarkan foto pribadi teman tanpa izinnya.',           // B ✔
                    'Menggunakan emoji untuk mengekspresikan diri.',           // C
                    'Berdiskusi dengan argumen logis.',                        // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Kemampuan memahami perasaan orang lain dalam konteks komunikasi digital disebut...',
                'opsi' => [
                    'Digital Empathy.',   // A
                    'Online Empathy.',    // B ✔
                    'Empati Sosial.',     // C
                    'Empati Kolektif.',   // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah strategi yang paling efektif untuk membangun etika digital dan empati daring?',
                'opsi' => [
                    'Mengirim pesan dengan caps lock agar pesanmu terlihat.',         // A
                    'Berlatih "perspektif ganda" sebelum berkomentar.',               // B ✔
                    'Mengabaikan pesan yang tidak menarik.',                           // C
                    'Selalu setuju dengan semua orang di online.',                     // D
                ],
                'jawaban_index' => 1,
            ],
        ];

        foreach ($data as $item) {

            $soal = SoalQuiz::create([
                'temaquiz_id' => 10, // ganti sesuai ID tema_quiz week10
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
