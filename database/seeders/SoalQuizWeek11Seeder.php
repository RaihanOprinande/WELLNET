<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek11Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'pertanyaan' => 'Merasa cemas dan hampa saat tidak memegang ponsel, serta sulit berhenti scrolling meskipun tahu ada tugas lain, adalah ciri-ciri dari...',
                'opsi' => [
                    'Stres biasa',                                         // A
                    'Digital Addiction (Kecanduan Digital)',               // B ✔
                    'Kelelahan',                                           // C
                    'Bosan',                                               // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Kemampuan untuk mengontrol pikiran, emosi, dan tindakan agar sesuai dengan tujuan jangka panjang (seperti mengurangi waktu main HP) disebut...',
                'opsi' => [
                    'Motivasi',                                            // A
                    'Disiplin',                                            // B
                    'Self-Regulation (Regulasi Diri)',                     // C ✔
                    'Kebiasaan',                                           // D
                ],
                'jawaban_index' => 2,
            ],
            [
                'pertanyaan' => 'Kamu ingin mengurangi kebiasaan membuka Instagram setiap kali merasa bosan. Strategi mana yang paling cocok untuk dicoba?',
                'opsi' => [
                    'Menghapus akun Instagram selamanya.',                                             // A
                    'Mencoba Delayed Response Technique: tunggu 10 detik dan tanyakan apakah perlu.',  // B ✔
                    'Meminta teman menyembunyikan ponselmu.',                                          // C
                    'Mengikuti semua akun selebriti agar tidak bosan.',                                // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => '"Digital detox berarti kamu harus sepenuhnya berhenti menggunakan semua perangkat digital untuk waktu yang lama."',
                'opsi' => [
                    'Fakta',   // A
                    'Mitos',   // B ✔
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah contoh tindakan yang paling efektif untuk mempraktikkan digital detox kecil dalam kehidupan sehari-hari?',
                'opsi' => [
                    'Mematikan ponsel selama seminggu penuh.',                                           // A
                    'Menetapkan waktu makan malam sebagai "zona bebas ponsel" untuk seluruh keluarga.',  // B ✔
                    'Menggunakan ponsel hanya untuk bekerja atau belajar.',                              // C
                    'Menghapus semua aplikasi media sosial.',                                            // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Bagaimana mindfulness dapat membantu mengurangi penggunaan smartphone bermasalah (PSU)?',
                'opsi' => [
                    'Membuatmu lebih cepat bosan dengan ponsel.',                 // A
                    'Membantu meregulasi emosi negatif dan mengurangi dorongan impulsif.', // B ✔
                    'Membuatmu melupakan ponsel.',                                // C
                    'Membantumu menemukan aplikasi baru yang lebih menarik.',     // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Apa itu "Harapan Negatif Penggunaan Smartphone"?',
                'opsi' => [
                    'Harapan untuk mendapatkan banyak like.',                          // A
                    'Menggunakan smartphone untuk menghindari emosi atau pengalaman negatif.', // B ✔
                    'Harapan untuk belajar hal baru dari smartphone.',                 // C
                    'Menggunakan smartphone saat merasa senang.',                      // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Mengapa regulasi emosional penting di media sosial?',
                'opsi' => [
                    'Agar bisa membalas komentar dengan cepat.',                                                                          // A
                    'Untuk menghindari kemarahan online, ujaran kebencian, dan toksisitas yang merugikan kesejahteraan online.',           // B ✔
                    'Agar bisa menunjukkan semua emosi kita.',                                                                              // C
                    'Untuk mendapatkan validasi dari orang lain.',                                                                          // D
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah strategi berikut yang termasuk dalam pengelolaan gawai secara sadar?',
                'opsi' => [
                    'Time-Boxing (menentukan waktu khusus untuk buka media sosial).',   // A ✔
                    'Terus-menerus scrolling tanpa batas waktu.',                       // B
                    'Membiarkan notifikasi menyala terus-menerus.',                     // C
                    'Menggunakan smartphone di tempat tidur hingga larut malam.',       // D
                ],
                'jawaban_index' => 0,
            ],
            [
                'pertanyaan' => 'Bagaimana hubungan antara self-regulation dengan kecanduan digital?',
                'opsi' => [
                    'Individu dengan self-regulation tinggi lebih mungkin mengalami kecanduan digital.',        // A
                    'Individu dengan self-regulation tinggi lebih mampu membatasi screen time dan menunda kesenangan.', // B ✔
                    'Self-regulation tidak memiliki hubungan dengan kecanduan digital.',                        // C
                    'Self-regulation hanya memengaruhi kecanduan game online.',                                 // D
                ],
                'jawaban_index' => 1,
            ],
        ];

        foreach ($data as $item) {

            $soal = SoalQuiz::create([
                'temaquiz_id' => 11, // sesuaikan dengan ID tema week 11
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
