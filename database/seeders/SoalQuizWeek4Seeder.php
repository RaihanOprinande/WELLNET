<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek4Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'pertanyaan' => 'Kamu menerima email dengan subjek "PERINGATAN! Akun Anda Akan Ditangguhkan dalam 24 Jam!". Menurut materi, taktik ini disebut apa?',
                'opsi' => [
                    'Clickbait',
                    'Fear Appeal (Imbauan Rasa Takut)',
                    'Pesan Spam',
                    'Marketing Strategy',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Saat menerima email ancaman seperti di atas, otak kita cenderung menggunakan jalur pemrosesan mana menurut Elaboration Likelihood Model (ELM)?',
                'opsi' => [
                    'Central Route (berpikir kritis dan logis).',
                    'Peripheral Route (terpengaruh isyarat dangkal dan emosi).',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Sebuah tautan di pesan WhatsApp terlihat seperti www.b4nk-aman.com/login. Sebelum mengkliknya, apa hal pertama yang harus kamu curigai?',
                'opsi' => [
                    'Tautan tersebut terlalu pendek.',
                    'Penggunaan angka "4" sebagai pengganti "a" dan tanda "-" yang tidak biasa pada domain bank.',
                    'Tautan tersebut tidak berwarna biru.',
                    'Tautan tersebut terlalu panjang.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => '"Hanya orang yang kurang cerdas yang bisa tertipu phishing."',
                'opsi' => [
                    'Fakta',
                    'Mitos',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Manakah tindakan berikut yang paling efektif untuk menghindari penipuan phishing?',
                'opsi' => [
                    'Membalas email phishing dengan kata-kata kasar.',
                    'Selalu memeriksa alamat email pengirim dan URL tautan sebelum mengklik.',
                    'Membagikan email phishing ke semua teman agar mereka tahu.',
                    'Mengunduh semua lampiran dari email yang tidak dikenal.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Apa itu phishing?',
                'opsi' => [
                    'Iklan pop-up yang mengganggu.',
                    'Upaya mencuri data pribadi dengan menyamar sebagai entitas terpercaya.',
                    'Perangkat lunak berbahaya yang menyebar di komputer.',
                    'Penipuan yang terjadi di media sosial.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Menurut ELM, jika seseorang dalam kondisi tenang dan berpikir kritis, ia akan menggunakan jalur pemrosesan mana untuk mengevaluasi pesan?',
                'opsi' => [
                    'Peripheral Route.',
                    'Central Route.',
                    'Shortcut Route.',
                    'Emotional Route.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Selain fear appeal, apa lagi contoh tanda khas pesan phishing?',
                'opsi' => [
                    'Janji hadiah palsu atau imbalan yang terlalu bagus untuk menjadi kenyataan.',
                    'Penggunaan gambar dan warna yang menarik.',
                    'Pesan yang sangat singkat.',
                    'Berasal dari alamat email yang dikenal.',
                ],
                'jawaban_index' => 0,
            ],
            [
                'pertanyaan' => 'Jika kamu curiga menerima pesan phishing, ke mana sebaiknya kamu melaporkannya?',
                'opsi' => [
                    'Ke grup chat teman.',
                    'Ke media sosial untuk membuat warning.',
                    'Ke CS resmi atau tim IT kampus/perusahaan.',
                    'Ke orang tua atau wali.',
                ],
                'jawaban_index' => 2,
            ],
            [
                'pertanyaan' => 'Menurut penelitian, siapa yang paling rentan terhadap phishing?',
                'opsi' => [
                    'Hanya anak-anak di bawah 12 tahun.',
                    'Hanya orang dewasa yang tidak paham teknologi.',
                    'Semua orang berpotensi menjadi korban, tergantung kondisi emosi atau literasi digital.',
                    'Hanya orang yang memiliki banyak uang.',
                ],
                'jawaban_index' => 2,
            ],
        ];

        foreach ($data as $item) {

            $soal = SoalQuiz::create([
                'temaquiz_id' => 4,
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
