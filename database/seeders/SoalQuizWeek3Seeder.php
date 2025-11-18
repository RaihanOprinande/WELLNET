<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoalQuiz;
use App\Models\OpsiSoal;

class SoalQuizWeek3Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'pertanyaan' => 'Kamu melihat teman sekelasmu diejek di kolom komentar Instagram. Sebagai bystander, tindakan apa yang menunjukkan empati dan sikap protektif?',
                'opsi' => [
                    'Ikut berkomentar lucu agar suasana tidak tegang. (Reinforcing)',
                    'Mengirim pesan pribadi (DM) untuk menyemangati temanmu dan melaporkan komentar jahat tersebut. (Protective)',
                    'Mengabaikannya karena itu bukan urusanmu. (Indifferent)',
                    'Menandai teman lain untuk ikut melihat ejekan tersebut.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Kemampuan untuk memahami sudut pandang dan alasan di balik perasaan orang lain di dunia maya, meskipun kamu tidak ikut merasakannya secara emosional, disebut...',
                'opsi' => [
                    'Empati Afektif',
                    'Simpati',
                    'Empati Kognitif',
                    'Altruisme',
                ],
                'jawaban_index' => 2,
            ],
            [
                'pertanyaan' => 'Manakah kalimat berikut yang paling mencerminkan dukungan empatik kepada seseorang yang menjadi korban cyberbullying?',
                'opsi' => [
                    'Makanya jangan posting yang aneh-aneh.',
                    'Aku turut prihatin, kamu kuat kok menghadapi ini. Ada yang bisa kubantu?',
                    'Sudahlah, jangan dipikirkan, itu cuma di internet.',
                    'Kamu harus membalas mereka agar tidak diremehkan.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => '"Pelaku cyberbullying seringkali tidak menyadari bahwa komentar mereka bisa berdampak psikologis serius karena menganggapnya sebagai humor."',
                'opsi' => [
                    'Fakta',
                    'Mitos',
                ],
                'jawaban_index' => 0,
            ],
            [
                'pertanyaan' => 'Selain melaporkan, manakah cara lain kamu bisa mendukung korban cyberbullying di dunia nyata?',
                'opsi' => [
                    'Menyebarkan screenshot ejekan tersebut agar semua orang tahu.',
                    'Mengajak korban bertemu langsung dan mendengarkan ceritanya tanpa menghakimi.',
                    'Meminta teman-teman lain untuk ikut mengejek pelaku.',
                    'Mengirimkan pesan anonim kepada pelaku.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Apa yang membedakan cyberbullying dari sekadar konflik online biasa?',
                'opsi' => [
                    'Terjadi di internet.',
                    'Ada niat untuk mengintimidasi, menghina, atau melecehkan secara berulang.',
                    'Melibatkan banyak orang.',
                    'Menggunakan bahasa yang kasar.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Menurut materi, manakah dampak psikologis yang paling mungkin dialami korban cyberbullying?',
                'opsi' => [
                    'Peningkatan rasa percaya diri.',
                    'Kecemasan, depresi, atau bahkan pikiran untuk menyakiti diri.',
                    'Lebih aktif di media sosial.',
                    'Peningkatan popularitas.',
                ],
                'jawaban_index' => 1,
            ],
            [
                'pertanyaan' => 'Seseorang yang menyaksikan cyberbullying tapi tidak terlibat secara langsung disebut apa?',
                'opsi' => [
                    'Pelaku.',
                    'Korban.',
                    'Bystander.',
                    'Mediator.',
                ],
                'jawaban_index' => 2,
            ],
            [
                'pertanyaan' => 'Manakah perilaku bystander yang paling positif dalam situasi cyberbullying?',
                'opsi' => [
                    'Menghina balik pelaku.',
                    'Bersikap diam dan pura-pura tidak melihat.',
                    'Membela korban, melaporkan kejadian, atau memberikan dukungan.',
                    'Menyukai komentar cyberbullying tersebut.',
                ],
                'jawaban_index' => 2,
            ],
            [
                'pertanyaan' => 'Mengapa empati kognitif sangat penting dalam interaksi online?',
                'opsi' => [
                    'Karena kita bisa merasakan emosi orang lain.',
                    'Karena lingkungan daring tidak menyajikan ekspresi wajah atau nada suara.',
                    'Karena itu bisa membuat kita lebih populer.',
                    'Karena itu bisa membuat kita memenangkan argumen.',
                ],
                'jawaban_index' => 1,
            ],
        ];

        foreach ($data as $item) {

            $soal = SoalQuiz::create([
                'temaquiz_id' => 3, // Week 3
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
