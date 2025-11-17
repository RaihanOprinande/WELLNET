<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek5Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // 1
            [
                'pertanyaan' => 'Temanmu membagikan info tentang "manfaat minum air garam untuk mencegah virus" karena ia tulus percaya info itu benar, padahal salah. Tindakannya termasuk...',
                'opsi' => [
                    'Disinformasi',
                    'Misinformasi',
                    'Hoax',
                    'Propaganda',
                ],
                'jawaban_index' => 1,
            ],

            // 2
            [
                'pertanyaan' => 'Kamu membaca berita yang isinya sangat sesuai dengan pandangan politikmu, dan kamu langsung merasa berita itu 100% benar tanpa mengecek sumber lain. Bias kognitif apa yang sedang bekerja?',
                'opsi' => [
                    'Confirmation Bias (Bias Konfirmasi)',
                    'Heuristik',
                    'Efek Dunning-Kruger',
                    'Anchoring Bias',
                ],
                'jawaban_index' => 0,
            ],

            // 3
            [
                'pertanyaan' => 'Kamu menemukan pesan berantai yang meresahkan di grup keluarga. Alat atau strategi apa yang paling tepat untuk kamu gunakan pertama kali?',
                'opsi' => [
                    'Langsung membagikannya ke grup lain agar semua waspada.',
                    'Menggunakan situs cek fakta seperti TurnBackHoax.id atau CekFakta.com.',
                    'Bertanya pada anggota grup apakah info itu benar.',
                    'Mencari tahu di media sosial apakah ada yang membahasnya.',
                ],
                'jawaban_index' => 1,
            ],

            // 4
            [
                'pertanyaan' => '"Berita hoax yang memicu emosi negatif (marah, takut) cenderung menyebar lebih cepat daripada berita netral."',
                'opsi' => [
                    'Fakta',
                    'Mitos',
                ],
                'jawaban_index' => 0,
            ],

            // 5
            [
                'pertanyaan' => 'Manakah prinsip berikut yang paling penting untuk kamu pegang teguh saat menerima informasi yang meragukan di media sosial?',
                'opsi' => [
                    '"Semakin banyak yang share, semakin benar."',
                    '"Jika informasinya bikin emosi, langsung share."',
                    '"Jangan langsung share! Berhenti sejenak dan periksa kebenarannya."',
                    '"Percaya saja pada apa yang dikatakan teman dekat."',
                ],
                'jawaban_index' => 2,
            ],

            // 6
            [
                'pertanyaan' => 'Apa itu disinformasi?',
                'opsi' => [
                    'Informasi yang tidak akurat, namun disebarkan tanpa niat jahat.',
                    'Informasi yang salah, keliru, atau menyesatkan yang sengaja dibuat dan disebarkan untuk menyebabkan kerugian.',
                    'Berita lucu yang dibagikan oleh teman.',
                    'Pendapat pribadi yang tidak populer.',
                ],
                'jawaban_index' => 1,
            ],

            // 7
            [
                'pertanyaan' => 'Bagaimana emosi seperti marah atau takut memengaruhi kemampuan kita mendeteksi informasi palsu?',
                'opsi' => [
                    'Meningkatkan kemampuan deteksi karena kita lebih waspada.',
                    'Menurunkan kemampuan deteksi karena kita cenderung menyebarkan info secara impulsif.',
                    'Tidak ada hubungannya dengan kemampuan deteksi.',
                    'Hanya memengaruhi penyebaran, bukan deteksi.',
                ],
                'jawaban_index' => 1,
            ],

            // 8
            [
                'pertanyaan' => 'Strategi membuka beberapa sumber untuk membandingkan fakta, bukan hanya mengandalkan satu link, disebut...',
                'opsi' => [
                    'Vertical Reading',
                    'Lateral Reading',
                    'Deep Reading',
                    'Skimming',
                ],
                'jawaban_index' => 1,
            ],

            // 9
            [
                'pertanyaan' => 'Manakah faktor sosial yang membuat kita mudah tertipu dan menyebarkan informasi palsu?',
                'opsi' => [
                    'Ingin terlihat pintar.',
                    'Takut ketinggalan info (FoMO).',
                    'Mencari perhatian.',
                    'Ingin bersaing dengan teman.',
                ],
                'jawaban_index' => 1,
            ],

            // 10
            [
                'pertanyaan' => 'Manakah tindakan berikut yang paling mencerminkan prinsip "Jadilah warga digital yang kritis, bukan reaktif"?',
                'opsi' => [
                    'Membalas semua komentar di media sosial.',
                    'Membagikan informasi setelah memverifikasinya.',
                    'Mengikuti semua tren yang ada.',
                    'Mengabaikan semua berita.',
                ],
                'jawaban_index' => 1,
            ],
        ];

        foreach ($data as $item) {
            $soal = SoalQuiz::create([
                'temaquiz_id' => 5,
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
