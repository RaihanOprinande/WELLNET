<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek1Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'pertanyaan' => 'Pernyataan "Semua informasi yang viral di media sosial sudah pasti benar dan terverifikasi."',
                'opsi' => [
                    'Fakta',
                    'Mitos'
                ],
                'jawaban_index' => 1, // jawaban B
            ],
            [
                'pertanyaan' => 'Manakah definisi yang paling tepat untuk "Literasi Digital"?',
                'opsi' => [
                    'Kemampuan menggunakan komputer dan internet dengan cepat.',
                    'Kemampuan untuk menemukan, mengevaluasi, menggunakan, dan membuat informasi secara bijak melalui teknologi digital.',
                    'Kemampuan untuk memiliki semua aplikasi media sosial terbaru.',
                    'Kemampuan untuk mengunduh aplikasi tanpa membaca deskripsi.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah contoh penggunaan ponsel yang paling mencerminkan perilaku produktif?',
                'opsi' => [
                    'Menghabiskan berjam-jam bermain game tanpa tujuan.',
                    'Menggunakan aplikasi kamus online untuk membantu tugas bahasa.',
                    'Terus-menerus scrolling media sosial saat belajar.',
                    'Membalas pesan chat setiap kali ada notifikasi.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Pilar literasi digital apa yang paling penting untuk mencegah hoax?',
                'opsi' => [
                    'Menemukan informasi.',
                    'Mengevaluasi informasi.',
                    'Menggunakan informasi.',
                    'Membuat informasi.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Tindakan yang mencerminkan literasi digital positif?',
                'opsi' => [
                    'Membagikan semua berita yang kamu baca.',
                    'Mencari tahu lebih dalam tentang topik dari sumber terpercaya.',
                    'Mengikuti semua tren challenge di TikTok.',
                    'Mengabaikan semua berita karena malas mengecek.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Kemampuan memahami cara konten digital dibuat termasuk pilar apa?',
                'opsi' => [
                    'Menemukan informasi.',
                    'Mengevaluasi informasi.',
                    'Menggunakan informasi.',
                    'Membuat informasi.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Risiko terbesar jika literasi digital rendah?',
                'opsi' => [
                    'Tidak bisa menggunakan aplikasi terbaru.',
                    'Mudah menjadi korban penipuan online / hoax.',
                    'Sulit mencari teman di sosial media.',
                    'Tidak bisa membuat konten menarik.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Sebagai warga digital yang bertanggung jawab, apa yang harus dilakukan?',
                'opsi' => [
                    'Hanya konsumsi konten hiburan.',
                    'Sebarkan informasi belum terverifikasi.',
                    'Menjaga jejak digital positif dan aman.',
                    'Mengkritik semua pendapat yang berbeda.',
                ],
                'jawaban_index' => 2,
            ],
            [
                'pertanyaan' => 'Andi mengecek sumber pesan berantai. Itu pilar apa?',
                'opsi' => [
                    'Menemukan informasi.',
                    'Mengevaluasi informasi.',
                    'Menggunakan informasi.',
                    'Membuat informasi.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Kebiasaan yang menunjukkan literasi digital baik?',
                'opsi' => [
                    'Punya semua akun sosial media.',
                    'Main game online berjam-jam.',
                    'Rutin cek pengaturan privasi akun.',
                    'Download semua aplikasi populer.',
                ],
                'jawaban_index' => 2,
            ],
        ];

        foreach ($data as $item) {

            $soal = SoalQuiz::create([
                'temaquiz_id' => 1,
                'pertanyaan' => $item['pertanyaan'],
                'jawaban_benar' => $item['opsi'][$item['jawaban_index']], // sesuai controller
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
