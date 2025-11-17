<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TemaQuiz;

class TemaQuizSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'week' => 1,
                'title' => 'Hutan Pengetahuan: Langkah Awal Sang Penjelajah',
                'topik' => 'Pengantar Literasi Digital',
                'materi_relevan' => 'Konsep Dasar Literasi Digital',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Memulai petualangan untuk memahami dasar-dasar literasi digital sebagai bekal menjelajahi dunia maya.',
            ],
            [
                'week' => 2,
                'title' => 'Lembah Tersembunyi: Melindungi Harta Digitalmu',
                'topik' => 'Privasi & Keamanan Data',
                'materi_relevan' => 'Amankah Data Pribadimu?',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Belajar menjaga privasi diri dan memahami bagaimana mengamankan aset digital.',
            ],
            [
                'week' => 3,
                'title' => 'Danau Refleksi: Menumbuhkan Empati di Dunia Maya',
                'topik' => 'Cyberbullying & Empati Daring',
                'materi_relevan' => 'Cyberbullying Bukan Candaan',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Mengenal pentingnya empati serta bahaya perilaku negatif di dunia maya.',
            ],
            [
                'week' => 4,
                'title' => 'Tebing Waspada: Menghindari Jurang Penipuan',
                'topik' => 'Phishing & Penipuan Digital',
                'materi_relevan' => 'Teman atau Tipuan? Hati-Hati Phishing!',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Mempelajari trik penipuan digital dan bagaimana menghindarinya.',
            ],
            [
                'week' => 5,
                'title' => 'Gua Kebenaran: Menyusuri Lorong Informasi Gelap',
                'topik' => 'Hoax & Disinformasi',
                'materi_relevan' => 'Hoax Alert! Jangan Asal Sebar!',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Belajar mengenali hoax serta bagaimana bersikap kritis terhadap informasi.',
            ],
            [
                'week' => 6,
                'title' => 'Jejak di Pasir: Tapakmu di Dunia Siber',
                'topik' => 'Jejak Digital & Reputasi',
                'materi_relevan' => 'Jejak Digitalmu, Tanggung Jawabmu',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Menjelajahi betapa pentingnya jejak digital dan bagaimana menjaganya.',
            ],
            [
                'week' => 7,
                'title' => 'Hutan Arena: Bertarung dengan Etika',
                'topik' => 'Online Gaming & Etika',
                'materi_relevan' => 'Etika Digital: Beradab di Dunia Maya',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Mengenal pentingnya etika dan sportsmanship di dunia gaming.',
            ],
            [
                'week' => 8,
                'title' => 'Padang Tenang: Menjaga Harmoni Digital & Diri',
                'topik' => 'Digital Wellbeing',
                'materi_relevan' => 'Bangun Keseimbangan Digital',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Menjaga keseimbangan antara dunia digital dan kehidupan nyata.',
            ],
            [
                'week' => 9,
                'title' => 'Menara Pandang: Melihat Dunia Digital dengan Jernih',
                'topik' => 'Konsumsi Konten & Kritis',
                'materi_relevan' => 'Kenali Deepfake & Manipulasi Visual',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Melatih kemampuan berpikir kritis dalam memilih konten digital.',
            ],
            [
                'week' => 10,
                'title' => 'Pulau Kebebasan: Navigasi Hak & Tanggung Jawab',
                'topik' => 'Hak Digital & Etika Internet',
                'materi_relevan' => 'Etika Digital: Beradab di Dunia Maya" & "Amankah Data Pribadimu?',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Mengenal hak digital serta cara bertanggung jawab dalam dunia maya.',
            ],
            [
                'week' => 11,
                'title' => 'Gunung Sunyi: Mendaki Diam, Menuju Jernih',
                'topik' => 'Digital Detox & Mindfulness',
                'materi_relevan' => 'Kecanduan Gawai? Sadar dan Kelola" & "Digital Resilience',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Belajar menyeimbangkan penggunaan teknologi dengan ketenangan batin.',
            ],
            [
                'week' => 12,
                'title' => 'Cermin Air Terjun: Refleksi Akhir Sang Petualang',
                'topik' => 'Refleksi Diri',
                'materi_relevan' => 'Merefleksikan perjalanan literasi digital.',
                'image' => 'assets/images/seeder/temaquiz.png',
                'description' => 'Menyimpulkan hasil perjalanan pembelajaran literasi digital.',
            ],
        ];

        foreach ($data as $item) {
            TemaQuiz::create($item);
        }
    }
}
