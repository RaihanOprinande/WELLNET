<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek7Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'pertanyaan' => 'Aturan tidak tertulis tentang perilaku sopan dalam game online, seperti tidak melakukan trash talk berlebihan atau menghormati pemain baru, adalah bagian dari...',
                'opsi' => [
                    'Aturan Game',
                    'Netiquette',
                    'Strategi Menang',
                    'Kode Curang',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Tim-mu kalah dalam sebuah pertandingan. Apa respons yang paling beretika?',
                'opsi' => [
                    'Menyalahkan satu pemain dan melaporkannya agar di-banned.',
                    'Mengucapkan "Good Game" (GG) kepada tim lawan dan merefleksikan apa yang bisa diperbaiki.',
                    'Langsung keluar dari game tanpa berkata apa-apa.',
                    'Mengirim pesan pribadi yang marah kepada pemain lain.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => '"Menggunakan cheat atau bug dalam game untuk keuntungan pribadi itu wajar, karena semua orang juga melakukannya."',
                'opsi' => [
                    'Fakta',
                    'Mitos',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Jika kamu ingin memberikan masukan kepada rekan tim yang performanya kurang baik, manakah cara yang paling beretika?',
                'opsi' => [
                    'Menggunakan all chat untuk mengkritiknya di depan semua pemain.',
                    'Mengirim pesan pribadi yang sopan setelah pertandingan berakhir, menawarkan bantuan atau tips.',
                    'Mengabaikannya dan berharap dia akan membaik sendiri.',
                    'Mengancam untuk keluar dari tim jika dia tidak membaik.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah perilaku berikut yang paling mencerminkan pemain game online yang beretika?',
                'opsi' => [
                    'Menggunakan bahasa kasar untuk memotivasi tim.',
                    'Membantu pemain baru memahami mekanisme game.',
                    'Meninggalkan pertandingan jika tim sedang kalah.',
                    'Mengirim spam di chat global.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Mengapa etika digital (netiquette) penting dalam interaksi online?',
                'opsi' => [
                    'Agar bisa memenangkan setiap argumen.',
                    'Untuk menghindari konflik dan membangun komunikasi yang sehat.',
                    'Agar akun kita tidak di-banned.',
                    'Untuk terlihat lebih pintar dari orang lain.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah perilaku berikut yang jelas melanggar etika digital?',
                'opsi' => [
                    'Mengirim pesan pribadi kepada teman.',
                    'Mengunggah foto seseorang tanpa izinnya.',
                    'Berdiskusi tentang topik sensitif dengan argumen logis.',
                    'Menggunakan emoji dalam pesan.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Apa tantangan utama dalam melatih empati digital dibandingkan dengan empati offline?',
                'opsi' => [
                    'Tidak adanya batasan waktu.',
                    'Kurangnya isyarat nonverbal seperti ekspresi wajah dan intonasi suara.',
                    'Lebih banyak orang yang terlibat.',
                    'Sulit menemukan topik pembicaraan.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Mengapa penting untuk "mengenali konteks platform" yang berbeda (misal: TikTok vs. LinkedIn) dalam etika digital?',
                'opsi' => [
                    'Agar bisa punya banyak akun.',
                    'Karena setiap platform memiliki budaya dan aturan tak tertulis yang berbeda.',
                    'Agar kita tahu cara menggunakan semua fitur.',
                    'Karena setiap platform punya pengguna yang berbeda.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah cara paling efektif untuk membangun empati daring?',
                'opsi' => [
                    'Menghabiskan lebih banyak waktu di media sosial.',
                    'Berlatih "perspektif ganda": membayangkan jika kita adalah penerima pesan tersebut.',
                    'Mengikuti akun-akun yang pandangannya sama dengan kita.',
                    'Membalas setiap komentar yang ada.',
                ],
                'jawaban_index' => 1,
            ],
        ];

        foreach ($data as $item) {

            $soal = SoalQuiz::create([
                'temaquiz_id' => 7, // ganti sesuai tema kamu
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
