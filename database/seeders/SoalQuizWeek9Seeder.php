<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek9Seeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ganti sesuai ID tema week 9 di tabel tema_quiz jika berbeda
        $temaquizId = 9;

        $data = [
            [
                'pertanyaan' => 'Gambar atau video yang dibuat oleh AI yang sangat realistis hingga sulit dibedakan dari aslinya, sering disebut...',
                'opsi' => [
                    'CGI',
                    'Photoshop',
                    'Deepfake',
                    'Augmented Reality',
                ],
                'jawaban_index' => 2,
            ],
            [
                'pertanyaan' => 'Kamu melihat sebuah gambar demonstrasi yang viral. Apa ciri yang bisa menandakan bahwa gambar itu mungkin buatan AI?',
                'opsi' => [
                    'Gambarnya sedikit buram.',
                    'Terlihat "terlalu sempurna" dan rapi, tanpa ada noise atau cacat visual yang wajar.',
                    'Warnanya tidak terlalu cerah.',
                    'Ukuran file gambar sangat besar.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Jika kamu meragukan keaslian sebuah gambar, apa langkah teknis pertama yang bisa kamu lakukan?',
                'opsi' => [
                    'Memperbesar gambar untuk mencari detail aneh.',
                    'Melakukan pencarian gambar terbalik (Reverse Image Search) di Google.',
                    'Menanyakan di kolom komentar apakah gambar itu asli.',
                    'Membagikan gambar tersebut dan bertanya pada teman.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => '"Konten AI-generated selalu akurat dan bebas dari bias."',
                'opsi' => [
                    'Fakta',
                    'Mitos',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah yang merupakan bagian dari strategi "3T" (Telusuri, Tunda, Tanyakan) saat menemukan gambar atau berita viral?',
                'opsi' => [
                    'Telusuri sumber asli.',
                    'Tunda reaksi emosional.',
                    'Tanyakan: "Siapa yang diuntungkan dari pesan ini?"',
                    'Semua benar.',
                ],
                'jawaban_index' => 3,
            ],
            [
                'pertanyaan' => 'Apa bahaya utama dari disinformasi visual berbasis AI?',
                'opsi' => [
                    'Membuat foto terlihat lebih bagus.',
                    'Menyebarkan narasi palsu yang bisa menimbulkan stigma atau kepanikan.',
                    'Mengurangi kreativitas seniman.',
                    'Membuat orang sulit mengenali wajah orang lain.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah yang merupakan salah satu ciri fake media berbasis AI, terutama dalam konteks gambar?',
                'opsi' => [
                    'Resolusi gambar rendah.',
                    'Gambar terlalu rapi atau tanpa noise (Aesthetic Realism).',
                    'Mengandung banyak teks.',
                    'Berukuran kecil.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Mengapa gambar atau video buatan AI dapat tampak sangat realistis hingga sulit dibedakan dari yang asli?',
                'opsi' => [
                    'Karena AI mengambil gambar dari kamera kualitas tinggi.',
                    'Karena AI menggunakan algoritma canggih dan data pelatihan yang besar untuk menghasilkan detail yang akurat.',
                    'Karena AI bekerja sama dengan fotografer profesional.',
                    'Karena AI bisa mengakses semua gambar di internet.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Apa tujuan utama pembuat disinformasi visual berbasis AI?',
                'opsi' => [
                    'Untuk menghibur masyarakat.',
                    'Untuk memanipulasi opini dan menyebarkan narasi palsu (politik, kesehatan, dll).',
                    'Untuk menunjukkan kemampuan AI.',
                    'Untuk membuat konten yang viral.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah tindakan yang paling efektif sebagai strategi perlindungan diri dari disinformasi visual berbasis AI?',
                'opsi' => [
                    'Hanya melihat gambar dari akun media sosial teman.',
                    'Menggunakan strategi "3T" (Telusuri, Tunda, Tanyakan).',
                    'Menghindari semua gambar yang ada di internet.',
                    'Meminta AI untuk memverifikasi gambar.',
                ],
                'jawaban_index' => 1,
            ],
        ];

        foreach ($data as $item) {
            $soal = SoalQuiz::create([
                'temaquiz_id'   => 9,
                'pertanyaan'    => $item['pertanyaan'],
                'jawaban_benar' => $item['opsi'][$item['jawaban_index']], // sesuai controller
            ]);

            foreach ($item['opsi'] as $index => $opsiText) {
                OpsiSoal::create([
                    'soalquiz_id' => $soal->id,
                    'opsi'        => $opsiText,
                    'is_correct'  => $index == $item['jawaban_index'] ? 1 : 0,
                ]);
            }
        }
    }
}
