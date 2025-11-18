<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek6Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ------------------ TANTANGAN 1 ------------------
            [
                'pertanyaan' => 'Menurut penelitian Feher (2019), manakah dari jejak digital berikut yang berada di LUAR kendali langsung kita?',
                'opsi' => [
                    'Mengunggah foto profil baru.',
                    'Menulis status di media sosial.',
                    'Konten tentang kita yang diviralkan atau di-screenshot orang lain.',
                    'Mengatur pengaturan privasi akun.',
                ],
                'jawaban_index' => 2, // C
            ],

            // ------------------ TANTANGAN 2 ------------------
            [
                'pertanyaan' => 'Seperti kasus "Telma", kamu menemukan blog lamamu saat remaja yang isinya sangat berbeda dengan dirimu sekarang. Perasaan apa yang paling mungkin muncul?',
                'opsi' => [
                    'Bangga karena tulisanmu terkenal.',
                    'Merasa asing dan tidak nyaman karena versi lama dirimu terekspos tanpa kendali.',
                    'Biasa saja, karena itu hanya masa lalu.',
                    'Senang karena punya kenangan masa lalu.',
                ],
                'jawaban_index' => 1, // B
            ],

            // ------------------ TANTANGAN 3 ------------------
            [
                'pertanyaan' => 'Strategi mencari namamu sendiri di Google untuk melihat jejak digital yang bisa diakses publik disebut...',
                'opsi' => [
                    'Googling',
                    'Self-Searching',
                    'Egosurfing',
                    'Digital Audit',
                ],
                'jawaban_index' => 2, // C (Egosurfing)
            ],

            // ------------------ TANTANGAN 4 ------------------
            [
                'pertanyaan' => '"Begitu kamu menghapus foto dari media sosial, foto itu akan benar-benar hilang dari internet selamanya."',
                'opsi' => [
                    'Fakta',
                    'Mitos',
                ],
                'jawaban_index' => 1, // B (Mitos)
            ],

            // ------------------ TANTANGAN 5 ------------------
            [
                'pertanyaan' => 'Manakah tindakan berikut yang paling efektif untuk mengelola jejak digitalmu secara lebih sehat?',
                'opsi' => [
                    'Mengunggah foto sebanyak mungkin agar terlihat aktif.',
                    'Rutin memeriksa pengaturan privasi akun lama dan menghapus postingan yang tidak relevan.',
                    'Tidak pernah menggunakan internet lagi.',
                    'Mengubah nama akun agar tidak bisa ditemukan.',
                ],
                'jawaban_index' => 1, // B
            ],

            // ------------------ TANTANGAN 6 ------------------
            [
                'pertanyaan' => 'Apa itu jejak digital (digital footprint)?',
                'opsi' => [
                    'Sejarah pembelian online.',
                    'Semua rekam data yang ditinggalkan individu saat menggunakan internet, baik sadar maupun tidak sadar.',
                    'Seberapa sering kamu posting di media sosial.',
                    'Lokasi GPS terakhir ponselmu.',
                ],
                'jawaban_index' => 1, // B
            ],

            // ------------------ TANTANGAN 7 ------------------
            [
                'pertanyaan' => 'Gambaran diri yang terbentuk berdasarkan aktivitas digital disebut...',
                'opsi' => [
                    'Profil sosial.',
                    'Reputasi online.',
                    'Identitas online.',
                    'Persona digital.',
                ],
                'jawaban_index' => 2, // C
            ],

            // ------------------ TANTANGAN 8 ------------------
            [
                'pertanyaan' => 'Mengapa "transisi identitas" bisa menjadi tantangan di era digital?',
                'opsi' => [
                    'Karena kita jadi punya banyak identitas.',
                    'Karena jejak digital masa lalu bisa muncul kembali dan bertentangan dengan identitas diri yang baru.',
                    'Karena sulit mengubah foto profil lama.',
                    'Karena orang lain tidak mau menerima perubahan kita.',
                ],
                'jawaban_index' => 1, // B
            ],

            // ------------------ TANTANGAN 9 ------------------
            [
                'pertanyaan' => 'Individu yang melihat identitas mereka terintegrasi antara online dan offline disebut memiliki identitas...',
                'opsi' => [
                    'Terpisah.',
                    'Profesional.',
                    'Hibrida.',
                    'Ganda.',
                ],
                'jawaban_index' => 2, // C
            ],

            // ------------------ TANTANGAN 10 ------------------
            [
                'pertanyaan' => 'Strategi paling penting untuk mengelola jejak digital secara sehat?',
                'opsi' => [
                    'Menggunakan VPN setiap saat.',
                    'Rutin melakukan refleksi diri tentang unggahan yang dibagikan.',
                    'Hanya mengikuti akun-akun populer.',
                    'Meminta semua teman untuk tidak menandai kita di foto.',
                ],
                'jawaban_index' => 1, // B
            ],
        ];

        foreach ($data as $item) {
            $soal = SoalQuiz::create([
                'temaquiz_id' => 6, // sesuaikan jika ID tema berbeda
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
