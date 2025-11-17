<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek2Seeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ini sesuai dengan ID Tema Week 2 di tabel tema_quiz
        $temaquizId = 2;

        $data = [
            [
                'pertanyaan' => 'Manakah dari berikut ini yang termasuk data pribadi yang SANGAT sensitif dan tidak boleh dibagikan di profil publik media sosial?',
                'opsi' => [
                    'Nama panggilan dan hobi.',
                    'Foto KTP, alamat rumah, dan nomor telepon.',
                    'Makanan favorit dan film kesukaan.',
                    'Tanggal lahir (tanpa tahun).',
                ],
                'jawaban_index' => 1, // Jawaban B
            ],
            [
                'pertanyaan' => 'Kamu mendapat notifikasi dari aplikasi game bahwa kamu harus memasukkan password media sosialmu untuk mendapatkan item langka. Apa yang sebaiknya kamu lakukan?',
                'opsi' => [
                    'Langsung memasukkan password agar tidak ketinggalan item langka.',
                    'Berhenti, tutup notifikasi itu, dan jangan pernah memberikan password-mu ke aplikasi pihak ketiga.',
                    'Meminta teman untuk mencobanya terlebih dahulu.',
                    'Mencari tahu di internet apakah aplikasi game tersebut terpercaya.',
                ],
                'jawaban_index' => 1, // Jawaban B
            ],
            [
                'pertanyaan' => '"Mengaktifkan Two-Factor Authentication (2FA) itu merepotkan dan tidak terlalu penting."',
                'opsi' => [
                    'Fakta',
                    'Mitos',
                ],
                'jawaban_index' => 1, // Jawaban B (Mitos)
            ],
            [
                'pertanyaan' => 'Manakah dari kombinasi password berikut yang paling kuat dan aman?',
                'opsi' => [
                    'namaku123',
                    'Password!',
                    'W3lln3t!@#2025',
                    'tanggal_lahirku',
                ],
                'jawaban_index' => 2, // Jawaban C
            ],
            [
                'pertanyaan' => 'Manakah tindakan berikut yang paling efektif untuk melindungi privasi datamu di media sosial?',
                'opsi' => [
                    'Mengunggah foto hanya saat liburan.',
                    'Membatasi informasi pribadi di profil dan mengatur siapa yang bisa melihat postinganmu.',
                    'Menggunakan nama samaran di semua akun.',
                    'Sering mengganti wallpaper ponsel.',
                ],
                'jawaban_index' => 1, // Jawaban B
            ],
            [
                'pertanyaan' => 'Pengumpulan otomatis dan terus-menerus atas jejak digital kita tanpa disadari oleh perusahaan atau pemerintah disebut...',
                'opsi' => [
                    'Phishing',
                    'Dataveillance',
                    'Cyberstalking',
                    'Spamming',
                ],
                'jawaban_index' => 1, // Jawaban B
            ],
            [
                'pertanyaan' => 'Mengapa privasi data sering disebut sebagai urusan kolektif, bukan hanya pribadi?',
                'opsi' => [
                    'Karena data kita bisa digunakan untuk menipu teman.',
                    'Karena data yang kita bagikan bisa mengungkap info tentang teman-teman kita juga.',
                    'Karena semua orang memiliki hak privasi yang sama.',
                    'Karena pemerintah bisa memantau data kita semua.',
                ],
                'jawaban_index' => 1, // Jawaban B
            ],
            [
                'pertanyaan' => 'Apa tanda paling jelas bahwa sebuah tautan atau file yang kamu terima mungkin berbahaya?',
                'opsi' => [
                    'Berasal dari temanmu.',
                    'Mengandung banyak emoji.',
                    'Meminta data pribadi atau password secara mendesak.',
                    'Memiliki nama file yang panjang.',
                ],
                'jawaban_index' => 2, // Jawaban C
            ],
            [
                'pertanyaan' => 'Apa hak dasar yang memberimu kendali atas informasi tentang dirimu yang dibagikan dan digunakan oleh pihak lain?',
                'opsi' => [
                    'Hak Akses.',
                    'Hak Berpendapat.',
                    'Hak Privasi Data.',
                    'Hak Kebebasan Informasi.',
                ],
                'jawaban_index' => 2, // Jawaban C
            ],
            [
                'pertanyaan' => 'Manakah strategi keamanan siber berikut yang harus kamu lakukan secara rutin?',
                'opsi' => [
                    'Sering mengganti ponsel baru.',
                    'Menggunakan kata sandi kuat dan mengaktifkan 2FA.',
                    'Membalas semua pesan dari nomor tidak dikenal.',
                    'Mengunduh semua aplikasi gratis dari internet.',
                ],
                'jawaban_index' => 1, // Jawaban B
            ],
        ];

        foreach ($data as $item) {

            $soal = SoalQuiz::create([
                'temaquiz_id' => 2,
                'pertanyaan' => $item['pertanyaan'],
                'jawaban_benar' => $item['opsi'][$item['jawaban_index']], // sesuai format controller
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
