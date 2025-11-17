<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Psychoeducation;

class PsychoeducationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Jejak Digitalmu, Tanggung Jawabmu',
                'topik' => 'Digital Footprint & Online Identity',
                'content' => '📌 1. Pengenalan: Apa Itu Jejak Digital dan Identitas Online?
Jejak digital (digital footprint) adalah semua rekam data yang ditinggalkan individu saat menggunakan internet baik secara sadar (posting, komentar, unggahan) maupun tidak sadar (cookie, lokasi, histori pencarian). Sementara itu, identitas online (online identity) adalah gambaran diri yang terbentuk berdasarkan aktivitas digital yang mencerminkan siapa kita di dunia maya (Feher, 2019).
Menurut Quintas-Mendes & Paiva (2023), identitas digital mencakup dua aspek penting:
•	Presentasi diri: bagaimana seseorang membentuk citra dirinya secara online
•	Reputasi: bagaimana orang lain memandang citra tersebut.
📍 2. Dampak Posting: Sekali Upload, Selalu Ada
Salah satu temuan penting dalam studi Feher (2019) adalah bahwa meskipun pengguna merasa memiliki kendali atas apa yang mereka unggah, kenyataannya tidak semua aspek dari jejak digital bisa mereka kontrol sepenuhnya. Dalam wawancaranya dengan 60 responden dari Asia Tenggara dan Eropa Tengah, Feher menemukan bahwa:
•	Sekitar 70% dari jejak digital dikendalikan secara sadar oleh pengguna melalui keputusan seperti memilih foto, mengatur profil, atau menghapus konten.
•	Namun, 30% sisanya berada di luar kendali, disebabkan oleh:
📈 Efek viral: Konten menyebar luas tanpa kontrol.
🔗 Tag/mention orang lain: Akun kita bisa dikaitkan dengan konten eksternal.
🗂️ Penyimpanan permanen: Data tersimpan di server meski sudah dihapus.
📸 Screenshot & kebocoran data: Konten bisa diabadikan atau tersebar tanpa izin.
🔄 3. Transisi Identitas: Jejak Lama, Diri yang Baru?
Perubahan fase kehidupan seperti dari remaja ke dewasa, dari mahasiswa ke profesional, atau dari identitas lama menuju identitas baru (misalnya perubahan gaya hidup, kepercayaan, atau orientasi karier) seringkali membawa pergeseran dalam cara seseorang ingin dilihat oleh dunia.
Namun, dalam era digital, jejak masa lalu tetap tertinggal, dan kadang muncul kembali tanpa kendali, menciptakan konflik antara:
•	Siapa kita saat ini, dan
•	Bagaimana masa lalu kita masih bisa diakses oleh publik.
📖 Contoh Nyata dari Studi Mendes & Paiva (2023)
Dalam penelitian tersebut, salah satu partisipan (Telma) menceritakan bahwa ia pernah membuat blog pribadi saat masih menjadi mahasiswa magister. Blog tersebut berisi puisi, cerita pribadi, dan kegiatan mengajar. Beberapa tahun kemudian, tanpa sepengetahuannya, blog itu dijadikan bahan kajian dalam kelas psikologi di universitas lain.
“I found out about two years later that this blog had been the subject of a course in a Psychology degree course in Brazil. Imagine how I felt when I read someone’s work talking about what was ‘my self’ in the blog. Really, at that time it was already as if it was another person for me...”
– (S9 Telma, dalam Mendes & Paiva, 2023, p. 7)
Telma merasakan keterasingan dari versi dirinya yang dulu. Ia menyadari bahwa meskipun secara pribadi ia sudah “berubah”, identitas lamanya masih hidup dan terekspos tanpa izin.
🎭 4. Persona Online vs Offline: Apakah Sama?
Di era digital saat ini, batas antara dunia nyata (offline) dan dunia maya (online) semakin tipis. Identitas seseorang tidak lagi hanya dibentuk dari interaksi langsung, tetapi juga dari jejak digital yang mereka tinggalkan: unggahan media sosial, komentar, blog, dan profil profesional.
Namun, tidak semua orang membangun identitas digital dengan cara yang sama. Mendes & Paiva (2023) menunjukkan adanya dua pendekatan utama:
A.	Identitas Hibrida – Dunia Nyata dan Dunia Maya Melebur
Individu melihat identitas mereka sebagai sesuatu yang terintegrasi sepenuhnya antara online dan offline. Mereka ini melihat bahwa teknologi digital bukan sekadar alat komunikasi, tetapi bagian dari keseharian dan pembentukan jati diri. Mereka tidak lagi memisahkan persona sebagai “saya di dunia nyata” dan “saya di internet”.
B.	Identitas Terpisah – Profesional vs Pribadi
Sebaliknya, ada pula yang secara sadar menjaga batas antara identitas profesional dan personal. Mereka memilih untuk tampil secara strategis dan terkendali di dunia maya, terutama jika berkaitan dengan profesi mereka (misalnya sebagai dosen, peneliti, atau tokoh publik). Pendekatan ini sering digunakan untuk menjaga privasi, kredibilitas profesional, dan menghindari risiko reputasi.
✅ 5. Langkah Praktis: Mengelola Jejak Digital Secara Sehat
Berikut adalah strategi dari hasil riset untuk mengelola identitas digital:
Strategi Praktis	Penjelasan
🔍 Egosurfing	Cari nama Anda di mesin pencari untuk mengetahui jejak digital Anda.
🛠️ Atur Privasi	Aktifkan kontrol privasi di akun media sosial Anda.
✍️ Refleksi Diri	Evaluasi unggahan sebelum membagikannya: “Apakah ini perlu? Aman? Mewakili saya dengan benar?”
🔐 Ganti Password	Gunakan kata sandi kuat dan unik untuk tiap platform.
🧹 Hapus yang Tidak Relevan	 Jika memungkinkan, hapus konten yang sudah tidak mencerminkan diri Anda saat ini.
',
            ],
            [
                'title' => 'Teman atau Tipuan? Hati-Hati Phishing!',
                'topik' => 'Phishing & Penipuan Online',
                'content' => '📌 Pembukaan: Apa Itu Phishing?
Phishing adalah bentuk rekayasa sosial online di mana pelaku menyamar sebagai entitas terpercaya seperti bank, marketplace, dosen, atau teman untuk mencuri data pribadi seperti username, password, atau nomor kartu kredit. Pesan phishing sering dikemas dengan kesan urgensi (misalnya ancaman penutupan akun) atau janji hadiah palsu, guna mendorong korban bereaksi cepat tanpa berpikir kritis (Vishwanath et al., 2011; Norris & Brookes, 2020).
💡 Mengapa Kita Mudah Tertipu?
Menurut Norris & Brookes (2020), pelaku phishing memanfaatkan emosi negatif seperti takut atau panik agar korban tergesa-gesa dan melewatkan tanda-tanda penipuan. Ini dikenal sebagai "fear appeal" misalnya ancaman penutupan akun atau pemblokiran layanan.
“Phishing emails cenderung memakai kata seperti warning, deadline, atau akun ditangguhkan untuk menciptakan reaksi emosional dan mendorong korban untuk segera bertindak.”
(Norris & Brookes, 2020)
🧠 Proses Psikologis di Balik Phishing
Menurut Elaboration Likelihood Model (ELM) yang dikembangkan oleh Richard E. Petty dan John T. Cacioppo (1986), terdapat dua jalur utama:
🔹 1. Central Route (Pemrosesan Sentral)
•	Digunakan saat seseorang dalam kondisi tenang, memiliki motivasi tinggi, dan mampu berpikir secara kritis.
•	Individu mengevaluasi pesan berdasarkan logika, bukti, dan argumen yang rasional.
•	Dalam konteks phishing: seseorang akan memeriksa alamat email pengirim, struktur bahasa, logika isi pesan, dan validitas tautan sebelum mempercayainya.
🔹 2. Peripheral Route (Pemrosesan Pinggiran)
•	Digunakan saat seseorang sedang terganggu emosi, merasa terburu-buru, atau kurang minat/kritis terhadap isi pesan.
•	Individu lebih mudah terpengaruh oleh isyarat dangkal, seperti:
o	Penampilan visual (logo, warna resmi)
o	Kesan urgensi atau ancaman
o	Penggunaan kata “hadiah”, “peringatan”, “akun diblokir”
•	Dalam phishing: individu langsung mempercayai pesan tanpa analisis mendalam hanya karena terlihat seperti dari lembaga resmi atau karena takut kehilangan akun.
Saat kita takut atau tergesa-gesa, kita cenderung tidak memeriksa alamat email, struktur kalimat, atau logo palsu, dan langsung percaya.
🧍‍♂️ Siapa yang Rentan?
Berdasarkan penelitian, tidak ada satu tipe kepribadian atau usia tertentu yang kebal terhadap phishing. Semua orang berpotensi menjadi korban, tergantung pada kondisi emosi, impulsivitas, atau kurangnya literasi digital. (Norris & Brookes, 2020; Vishwanath et al., 2011)
🛡️ Tips Menghindari Phishing:
1.	Cek Pengirim Email: Apakah domain email benar (misal: @bank.co.id atau @gmail.com)?
2.	Jangan Panik: Waspadai email yang memberi tekanan waktu atau ancaman.
3.	Cek Tautan Sebelum Klik: Arahkan kursor ke link, periksa URL yang muncul.
4.	Hindari Berbagi Data Pribadi di Chat/Email.
5.	Laporkan ke CS Resmi atau IT Kampus jika ragu.
',
            ],
            [
                'title' => 'Hoax Alert! Jangan Asal Sebar',
                'topik' => 'Misinformasi, Disinformasi, dan Hoax',
                'content' => '🧠 1. Apa Itu Misinformasi, Disinformasi, dan Hoax
a.	Misinformasi adalah informasi yang tidak akurat, menyesatkan, atau salah, namun disebarkan tanpa adanya niat jahat. Artinya, orang yang menyebarkannya percaya bahwa informasi tersebut benar, padahal sebenarnya tidak. Ini bisa terjadi karena kurangnya verifikasi atau ketidaktahuan (Wardle & Derakhshan, 2017 ). Contoh: Membagikan info obat herbal untuk COVID-19 tanpa mengecek kebenarannya.
b.	Informasi yang salah, keliru, atau menyesatkan yang sengaja dibuat dan disebarkan untuk menyebabkan kerugian, menipu, atau memperoleh keuntungan European Commission (2018). Contoh: Video editan palsu yang dimaksudkan untuk menjatuhkan tokoh politik.
c.	Hoax adalah bentuk disinformasi yang dirancang untuk memanipulasi emosi dan menimbulkan kepanikan atau keresahan sosial ketidaktahuan (Wardle & Derakhshan, 2017 ). Biasanya hoax disebarkan dalam bentuk pesan berantai yang tampak meyakinkan, seringkali menyebutkan "katanya", "dari orang dalam", atau "harap segera disebarkan". Contoh: Pesan berantai yang menyebutkan akan ada gempa besar berdasarkan info mistis.
🔍 2. Mengapa Kita Mudah Tertipu? Faktor Psikologisnya:
🔸 Bias Kognitif
•	Confirmation bias: Kita cenderung mempercayai informasi yang sesuai dengan pandangan kita sendiri.
•	Heuristik: Kita mengambil keputusan cepat berdasarkan "kesan awal", bukan bukti.
🔸 Faktor Emosional
•	Emosi seperti marah, takut, atau cemas mendorong kita untuk menyebarkan info secara impulsif tanpa verifikasi.
•	Mood tertentu (gembira/cemas) bisa menurunkan kemampuan deteksi terhadap informasi palsu.
🔸 Motivasi Sosial
•	Ingin membantu orang lain (altruisme) ➝ menyebarkan info tanpa mengecek.
•	Takut ketinggalan info (Fear of Missing Out / FoMO) ➝ ikut sebar agar "terlihat tahu".
📖 (Munusamy et al., 2024; Martel et al., 2021)
🛠️ 3. Strategi Melawan Misinformasi & Hoax
•	Lateral Reading : membuka beberapa sumber untuk membandingkan fakta, bukan hanya mengandalkan satu link.
•	Emosi = Waspada : waspadai berita yang membangkitkan emosi negative secara tiba-tiba (marah, takut, benci).
•	Perikasa Sumber dan Kredibilitas : cek kredensial penulis dan situs: apakah ini media resmi, punya sejarah menyebar hoax?
•	Gunakan Tools Cek Fakta : Gunakan situs seperti: TurnBackHoax.id, CekFakta.com, Google Fact Check.
📖 (Boler et al., 2025; Tully et al., 2020)
💡 4. Apa yang Bisa Kita Lakukan?
🔹Jangan langsung klik share! Berhenti sejenak dan periksa.
🔹Edukasi orang sekitar tentang perbedaan misinformasi dan disinformasi.
🔹Ikuti pelatihan literasi digital dan media.
🔹 Jadilah warga digital yang kritis, bukan reaktif.',
            ],
            [
                'title' => 'Cyberbullying Bukan Candaan',
                'topik' => 'Cyberbullying Awareness & Empathy',
                'content' => '1. Apa Itu Cyberbullying?
Cyberbullying adalah tindakan intimidasi, penghinaan, atau pelecehan yang dilakukan melalui media elektronik seperti media sosial, chat, atau game online. Tindakan ini termasuk:
•	Menyebarkan hoaks atau fitnah.
•	Menghina fisik, ras, agama, atau latar belakang.
•	Mengunggah gambar/video korban tanpa izin.
•	Mengucilkan atau mengabaikan seseorang secara daring.
Cyberbullying dapat menyebabkan kecemasan, depresi, menyakiti diri, bahkan pikiran untuk bunuh diri (Zhou et al., 2024; Hu et al., 2023)
2. Cyberbullying Bukan Candaan
Cyberbullying sering kali dimulai dari tindakan yang dianggap ringan seperti mengejek fisik, menyebarkan rumor, atau membuat meme yang mempermalukan seseorang (Zhou et al., 2024). Namun, ketika perilaku ini dilakukan secara berulang dan melibatkan banyak orang di ruang digital, dampaknya sangat merusak, baik bagi korban maupun pelaku (Hu et al., 2023).
Dalam banyak kasus, pelaku bahkan tidak menyadari bahwa komentar mereka bisa berdampak psikologis serius karena menganggapnya sebagai bentuk humor (Zhou et al., 2024).
Selain itu, penyebaran informasi yang salah (hoaks) secara daring juga bisa memicu tindakan perundungan massal (Arbiyah et al., 2020). Penelitian menunjukkan bahwa informasi tidak akurat dapat mengganggu memori semantik seseorang, menyebabkan individu mempercayai informasi salah sebagai kebenaran (Arbiyah et al., 2020).
3. Mengapa Empati Itu Penting?
Empati adalah kemampuan untuk memahami dan merasakan perasaan orang lain (Hu et al., 2023).
Terdapat dua jenis empati menurut Zhou et al., (2024) :
•	Empati Afektif, yaitu kemampuan merasakan emosi orang lain secara emosional
•	Empati Kognitif, yaitu kemampuan memahami emosi orang lain secara rasional/logis.
Dalam konteks online, empati kognitif lebih efektif karena lingkungan daring sering kali tidak menyajikan ekspresi wajah atau nada suara.
Studi juga menunjukkan bahwa empati mendorong remaja untuk terlibat dalam perilaku menolong korban cyberbullying (Hu et al., 2023).
4. Peran Bystander dalam Cyberbullying
Bystander adalah individu yang menyaksikan cyberbullying tetapi tidak terlibat secara langsung (Zhou et al., 2024).
Perilaku bystander terbagi menjadi tiga kategori:
•	Protektif: membela korban, melaporkan kejadian, atau memberikan dukungan.
•	Indiferent: bersikap diam atau tidak peduli terhadap kejadian tersebut.
•	Reinforcing: menyukai, menyebarkan, atau mendukung konten perundungan
Bystander memiliki peran penting karena sikap mereka bisa memperkuat atau melemahkan tindakan perundungan (Hu et al., 2023). Empati berperan sebagai prediktor penting dalam mendorong bystander untuk menjadi penolong dan bukan pendukung pelaku (Hu et al., 2023).
5. Langkah Menjadi Agen Perubahan
Setiap remaja dapat mengambil peran aktif dalam menciptakan ruang digital yang lebih aman:
•	Jadilah berani: laporkan konten atau akun yang melakukan cyberbullying
•	Berikan dukungan pada korban, baik secara langsung maupun lewat pesan positif
•	Saring sebelum sharing: verifikasi informasi sebelum menyebarkannya
•	Tingkatkan literasi digital dan empati kognitif, agar dapat memahami dampak tindakan kita terhadap orang lain di dunia maya.',
            ],
            [
                'title' => 'Etika Digital: Beradab di Dunia Maya',
                'topik' => 'Digital Manners & Online Empathy',
                'content' => '1.	Apa Itu Netiquette?
Digital manners disebut juga Netiquette adalah seperangkat norma sosial digital yang mengatur perilaku dalam komunikasi daring (Heitmayer & Schimmelpfennig, 2023).
Ia mencakup norma deskriptif (apa yang kebanyakan orang lakukan) dan norma injunktif (apa yang seharusnya dilakukan) dalam ruang digital (Linek & Ostermaier-Grabow, 2018).
Contoh netiquette meliputi:
•	Tidak menyebarkan hoaks atau informasi pribadi tanpa izin.
•	Menghindari caps lock (yang dianggap "berteriak").
•	Memberikan respon sopan dan tidak menyinggung.
2.	Mengapa Etika Digital Penting?
Kurangnya pemahaman netiquette bisa menimbulkan kesalahpahaman, konflik, bahkan pelecehan digital (Soler-Costa et al., 2021).
Pengguna yang paham etika digital akan lebih mampu:
•	Membangun komunikasi yang sehat.
•	Menjaga reputasi online.
•	Menghindari tindakan tidak etis yang berdampak hukum.
3.	Online Empathy: Kunci Beradab di Dunia Maya
Online empathy adalah kemampuan memahami perasaan orang lain dalam konteks komunikasi digital (Heitmayer & Schimmelpfennig, 2023).
Empati digital mencakup:
•	Empati Kognitif: memahami maksud dan perspektif lawan bicara.
•	Empati Emosional: merasakan apa yang dirasakan orang lain.
Ketika berinteraksi secara daring, isyarat nonverbal seperti ekspresi wajah dan intonasi tidak tersedia, sehingga empati kognitif menjadi sangat penting (Soler-Costa et al., 2021)
4.	Tantangan Etika Digital
Beberapa perilaku umum yang melanggar etika digital:
•	Komentar sarkastik atau menghina.
•	Menyebarkan foto tanpa izin.
•	Mengabaikan pesan atau bersikap pasif-agresif.
•	Menyalahgunakan anonim untuk merundung
Dalam penelitian tentang interaksi mahasiswa dan dosen di media sosial, ditemukan bahwa perilaku online sering kali tidak mencerminkan norma sopan santun yang diharapkan secara profesional (Linek & Ostermaier-Grabow, 2018).
5.	Cara Membangun Etika Digital dan Empati Daring
a.	Kenali Konteks Platform
Setiap platform memiliki budaya dan aturan tak tertulis. Misalnya, etika di TikTok berbeda dari LinkedIn (Heitmayer & Schimmelpfennig, 2023).
b.	Jaga Bahasa dan Nada Komunikasi
Gunakan kata-kata sopan, hindari sarkasme atau ironi yang bisa disalahartikan.
c.	Periksa Ulang Sebelum Mengirim
Pastikan pesan tidak menyinggung atau berpotensi disalahartikan.
d.	Latih Perspektif Ganda
Sebelum berkomentar, bayangkan jika kamu adalah penerima pesan tersebut.',
            ],
            [
                'title' => 'Amankah Data Pribadimu?',
                'topik' => 'Data Privacy & Cybersecurity',
                'content' => '🧠 1. Apa Itu Privasi Data dan Mengapa Penting?
•	Privasi data pribadi adalah hak untuk mengontrol informasi tentang diri kita yang dibagikan dan digunakan oleh pihak lain.
Misalnya: alamat, nomor HP, lokasi GPS, hingga histori pencarian di Google.
•	Surveilans digital dilakukan oleh berbagai pihak: pemerintah, perusahaan teknologi, bahkan individu seperti mantan pacar atau teman (Liu et al., 2024).
•	Data digital tidak hanya mencerminkan identitas, tetapi juga bisa digunakan untuk mengontrol, mempengaruhi, atau mengeksploitasi kita secara tidak langsung (Meier & Krämer, 2024).
⚠️ 2. Ancaman Privasi di Dunia Maya
🔸 Government Surveillance
Pemerintah menggunakan AI dan big data untuk memantau aktivitas warga atas nama keamanan (Liu et al., 2024).
🔸 Commercial Surveillance
Perusahaan memantau perilaku digital kita untuk menargetkan iklan, harga dinamis, atau manipulasi konten (Liu et al., 2024).
🔸 Interpersonal Surveillance
Individu seperti pasangan, orang tua, bahkan stalker bisa mengawasi kita melalui media sosial (Trottier, 2012).
🔸 Dataveillance
Pengumpulan otomatis dan terus-menerus atas jejak digital kita tanpa disadari
🧩 3. Faktor Psikologis yang Mempengaruhi Perlindungan Privasi
🔹 Kekhawatiran terhadap Privasi (Privacy Concern)
Makin besar kekhawatiran, makin tinggi kemungkinan orang melindungi datanya. Tapi kadang ada “privacy paradox”: khawatir tapi tetap pasif!
📖 (Meier & Krämer, 2024; Liu et al., 2024)
🔹 Kesadaran terhadap Algoritma
Banyak yang tidak sadar kalau perilaku online mereka diproses oleh algoritma untuk menyusun profil digital.
📖 (Liu et al., 2024)
🔹 Kontrol yang Dirasakan (Perceived Privacy Control)
Semakin kita merasa bisa mengatur siapa yang bisa lihat data kita, makin besar motivasi untuk menjaga keamanan data.
📖 (Liu et al., 2024)
🧠 4. Privasi Itu Kolektif, Bukan Cuma Urusan Pribadi!
•	Data yang kamu bagikan bisa mengungkap info temanmu juga!
•	Studi menunjukkan bahwa algoritma dapat memprediksi perilaku orang lain dari jaringan sosialmu, bahkan jika mereka sendiri tidak membagikan datanya.
📖 (Bagrow et al., 2019 dalam Meier & Krämer, 2024)
Artinya: Kamu bisa "membocorkan" privasi orang lain tanpa sadar.
•	Remaja perlu menyadari bahwa melindungi data adalah bentuk tanggung jawab sosial.
📖 (Meier & Krämer, 2024)
🛠️ 5. Strategi Perlindungan Data & Cybersecurity
✅ Gunakan kata sandi kuat dan aktifkan 2FA (two-factor authentication).
✅ Jangan sembarangan klik link mencurigakan (phishing).
✅ Batasi informasi pribadi di profil media sosial.
✅ Cek ulang aplikasi sebelum memberikan izin akses lokasi/kontak.
✅ Gunakan VPN dan pengelola kata sandi bila memungkinkan.
📖 (Elrayah & Jamil, 2023)
💡 6. Peran Literasi Digital & Kesadaran Siber
•	Literasi digital seperti pemahaman tentang hak cipta, digital citizenship, dan kurasi konten berhubungan langsung dengan perilaku keamanan siber
•	Cybersecurity awareness berperan penting dalam mengubah pengetahuan menjadi aksi nyata.
•	Kesadaran tinggi membuat seseorang lebih hati-hati dalam berbagai aspek digital, termasuk penyebaran data dan interaksi online.
📖 (Elrayah & Jamil, 2023)
📣 7. Ayo Jadi Pengguna Digital yang Cerdas!
🔹Jangan asal install aplikasi.
🔹Lindungi data teman, bukan cuma data sendiri.
🔹 Edukasi diri dan orang sekitar soal hak digital.
🔹 Bikin ruang digital lebih aman dan etis untuk semua.',
            ],
            [
                'title' => 'Kecanduan Gawai? Sadari dan Kelola',
                'topik' => 'Digital Addiction & Self-Regulation',
                'content' => 'Bagian 1: Apa Itu Digital Addiction?
Digital Addiction atau Internet Addiction adalah kondisi psikologis ketika seseorang mengalami dorongan kompulsif untuk terus-menerus menggunakan perangkat digital (HP, laptop, game online, media sosial) meskipun hal tersebut mengganggu aktivitas, relasi, atau kesehatan.

Ciri-ciri:
•	Sulit berhenti menggunakan HP meski tahu harus fokus belajar.
•	Mengalami kecemasan saat tidak memegang ponsel.
•	Merasa hampa atau bosan jika tidak online.
•	Tidur terganggu karena scrolling berlebihan.

Data Ilmiah: Penelitian Li et al. (2021) menunjukkan bahwa digital addiction memiliki hubungan negatif dengan self-control dan berkorelasi dengan impulsivitas tinggi.

	Pop-up pertanyaan reflektif: "Kapan terakhir kali kamu merasa menyesal karena terlalu lama main HP?"

Bagian 2: Self-Regulation = Kunci!
Apa itu self-regulation? Self-regulation adalah kemampuan untuk mengontrol pikiran, emosi, dan tindakan agar tetap selaras dengan tujuan jangka panjang.

Hubungan dengan kecanduan digital:
•	Individu dengan self-regulation tinggi lebih mampu membatasi screen time.
•	Mereka lebih bisa menunda kesenangan (impuls kontrol).
•	Penggunaan berlebihan sering kali terjadi saat stres atau bosan (coping yang maladaptif).

Bagian 3: Strategi Kelola Gawai Secara Sadar
Strategi berbasis penelitian:
1.	Time-Boxing
•	Menentukan waktu khusus untuk buka media sosial (misal: 30 menit setelah belajar).
•	Gunakan timer atau fitur pemblokir aplikasi.
2.	Delayed Response Technique
•	Saat ingin membuka app, tunggu 10 detik untuk mempertimbangkan. Bila tidak perlu, jangan buka.
3.	Detoks Digital Bertahap
•	Mulai dari 1 jam tanpa HP/hari, lalu meningkat.
4.	Reward Based Self-Regulation
•	Beri hadiah pada diri sendiri jika berhasil tidak scroll di waktu belajar.',
            ],
            [
                'title' => 'Bangun Keseimbangan Digital',
                'topik' => 'Digital Wellbeing & Mindful Tech Use',
                'content' => 'a.	Apa itu Digital Wellbeing?
Digital Wellbeing adalah kondisi keseimbangan antara penggunaan teknologi dengan kesejahteraan mental, fisik, dan sosial individu.
Tanda Digital Wellbeing yang Sehat:
•	Menggunakan teknologi secara sadar.
•	Mampu berhenti dari perangkat saat diperlukan.
•	Tidak merasa cemas atau bersalah saat tidak online.
•	Koneksi sosial tetap terjaga secara luring.

b.	Konsep Mindful Tech Use
Mindful Tech Use berarti menggunakan teknologi dengan kesadaran penuh — sadar terhadap tujuan, durasi, dan dampaknya terhadap diri sendiri dan orang lain.
Prinsip Dasar:
•	Aware: Sadar sedang menggunakan teknologi.
•	Intentional: Ada tujuan jelas dari penggunaan.
•	Non-Reactive: Tidak impulsif atau terdorong FOMO (fear of missing out).
•	Reflective: Evaluasi dampaknya terhadap emosimu.

c.	Dampak Negatif Penggunaan Teknologi yang Tidak Disadari
Penggunaan teknologi tanpa kesadaran dapat menyebabkan:
•	Stres digital dan tekanan sosial akibat media sosial.
•	Penurunan empati, kualitas tidur, dan kontrol diri.
•	Kecanduan digital (loss of control, neglect of responsibilities).

d.	Strategi Meningkatkan Digital Wellbeing
1)	Latihan Digital Mindfulness
Bentuk kegiatan:
•	Meditasi 5 menit sebelum & sesudah penggunaan media sosial.
•	Teknik pernapasan sebelum membuka notifikasi.
•	Refleksi harian: “Bagaimana penggunaan HP saya memengaruhi mood saya hari ini?”
2)	Penggunaan Aplikasi Mindfulness
Penggunaan aplikasi mindfulness secara rutin:
•	Meningkatkan kesadaran (awareness)
•	Menurunkan distress psikologis
•	Meningkatkan empati dan self-regulation
3)	Aturan “Conscious Check-In”
Tiap kali ingin membuka gadget:
•	Apa tujuan saya?
•	Apakah ini waktu terbaik untuk melakukannya?
•	Bagaimana perasaan saya setelahnya?',
            ],
            [
                'title' => 'Kenali Deepfake & Manipulasi Visual',
                'topik' => 'AI-generated Content, Fake Media',
                'content' => 'a.	Apa Itu AI-Generated Content?
Konten AI adalah teks, gambar, video, atau audio yang dihasilkan oleh algoritma kecerdasan buatan (AI). Konten ini dapat bermanfaat, tapi juga dapat digunakan untuk menyesatkan (disinformasi).
Catatan Penting: AI dapat membuat gambar yang sangat realistis, namun sebenarnya fiktif atau dimanipulasi, sehingga sulit dibedakan dari yang asli.

b.	Bahaya Disinformasi Visual Berbasis AI
Disinformasi visual menggunakan gambar atau video AI untuk menyebarkan:
•	Narasi politik palsu
•	Hoaks kesehatan
•	Stigma kelompok tertentu
Penelitian terbaru menunjukkan bahwa pengguna:
•	Cenderung percaya pada gambar AI yang tampak sangat realistis.
•	Sering salah menilai keaslian gambar yang memiliki efek emosional tinggi (contoh: bencana, kekerasan).

c.	Ciri-ciri Fake Media Berbasis AI
Aspek	Penjelasan	Contoh
Aesthetic Realism	Terlalu rapi / tanpa noise	Gambar demo yang tampak "terlalu sempurna"
Emotional Salience	Menyentuh emosi secara ekstrem (marah, sedih, takut)	Foto “anak korban perang” yang ternyata AI-generated
Sumber Tidak Jelas	Tidak ada kredensial/jurnalis	Hanya link WhatsApp atau akun anonim
Tidak Terdeteksi di Reverse Image	Saat dicek dengan Google Images, tidak muncul referensi	Biasanya karena gambar baru dibuat oleh AI

d.	Strategi Perlindungan Diri
Gunakan “3T” Saat Menemukan Gambar Viral
1.	Telusuri sumber asli
2.	Tunda reaksi emosional
3.	Tanyakan: “Siapa yang diuntungkan dari pesan ini?”',
            ],
            [
                'title' => 'Privasi dalam Chat & Media Sosial',
                'topik' => 'Sexting, Oversharing, dan Digital Boundaries',
                'content' => 'Hati-Hati Jempolmu!
Dunia maya itu seperti magnet, mudah banget buat kita share apa saja. Tapi, ada beberapa hal yang harus kita pahami dengan baik: Sexting dan Oversharing.
Sexting: Apa yang Perlu Kamu Tahu?
Sexting adalah tindakan membuat dan berbagi gambar atau pesan seksual melalui perangkat teknologi, seperti ponsel atau internet. Meskipun beberapa penelitian menunjukkan bahwa sexting sukarela bukanlah kejahatan, namun berpotensi menjadi perilaku berisiko. Sexting bisa jadi pintu gerbang untuk terekspos pada jenis viktimisasi berbahaya seperti sextortion,
online grooming, atau cyberbullying.

Ada Dua Jenis Sexting yang Penting Diketahui:
•	Sexting Eksperimental: Ini mengacu pada kasus di mana remaja secara sukarela mengambil foto diri mereka untuk menciptakan ketertarikan atau minat romantis pada orang lain, tanpa melibatkan penyalahgunaan atau paksaan.
•	Sexting Agravasi (Aggravated Sexting): Kategori ini mencakup semua jenis sexting yang mungkin melibatkan unsur pidana atau penyalahgunaan di luar pembuatan, pengiriman, atau kepemilikan konten seksual yang diproduksi remaja, termasuk keterlibatan orang dewasa, atau perilaku kriminal atau menyalahgunakan oleh anak di bawah umur.

Mengapa Sexting Berisiko?
•	Dampak Kesehatan Mental:
o	Banyak penelitian menemukan hubungan positif antara sexting dan gejala
depresi1. Remaja yang melaporkan sexting secara signifikan lebih mungkin melaporkan gejala depresi dan kecemasan dibandingkan mereka yang tidak. Beberapa studi bahkan menemukan hubungan antara sexting, gejala depresi, dan pikiran/upaya bunuh diri.
o	Sexting juga sering dikaitkan dengan gejala
kecemasan. Remaja yang menerima sexting yang tidak diinginkan atau mengirim sexting di bawah paksaan melaporkan depresi, kecemasan, dan stres yang lebih tinggi, serta harga diri yang lebih rendah.
•	Viktimisasi Siber: Sexting meningkatkan risiko viktimisasi siber, tidak hanya dari pengirim langsung tetapi juga dari siapa pun yang mungkin memiliki akses ke konten tersebut, karena remaja dapat secara tidak sengaja terekspos pada konten seksual yang tidak diinginkan. Viktimisasi siber adalah faktor risiko untuk gejala depresi di masa depan, gejala kecemasan sosial, dan kesejahteraan di bawah rata-rata di kalangan remaja.
•	Perilaku Seksual Berisiko: Studi menunjukkan hubungan yang signifikan antara sexting dan perilaku seksual berisiko seperti aktivitas seksual umum, seks tanpa pengaman, dan memiliki lebih dari satu pasangan seksual.
•	Penyalahgunaan Zat: Keterlibatan dalam sexting dikaitkan dengan tingkat penggunaan alkohol dan obat-obatan terlarang yang lebih.
•	Impulsivitas dan Penilaian Buruk: Sexting dapat dilihat sebagai perilaku yang didorong oleh emosi, seringkali impulsif dan tanpa antisipasi atau pemahaman yang jelas tentang konsekuensi negatif yang mungkin terjadi.
•	Harga Diri Rendah: Harga diri yang tinggi secara negatif terkait dengan pengiriman atau penampilan gambar seksual diri, dan untuk remaja putri, ada hubungan signifikan antara sexting dan gejala depresi.

❓ Q: "Tapi kan aku sukarela?"
•	Meskipun sukarela, studi menunjukkan bahwa hasil psikologis bervariasi ketika ada paksaan seksual. Sexting sukarela juga telah dikaitkan dengan penggunaan alkohol dan tembakau, menjadi korban cyberbullying, dan melaporkan gejala depresi serta upaya bunuh diri sebelumnya, terutama pada responden pria.

Tantangan Level Up:
•	"Pikirkan Sebelum Kirim": Sebelum mengirim gambar atau pesan pribadi yang sensitif, tanyakan pada dirimu:
o	Apakah ini benar-benar aman?
o	Apa dampaknya jika ini tersebar luas?
o	Apakah saya benar-benar ingin ini dilihat orang lain di masa depan?
o	Ingat, apa yang sudah terkirim tidak bisa ditarik kembali sepenuhnya!
•	"Zona Nyaman Digital": Diskusikan dengan teman terpercaya atau orang dewasa tentang batasan apa yang kamu rasa nyaman untuk dibagikan secara online dan mana yang harus tetap jadi privasimu.

Oversharing: Batasan Privasimu di Dunia Maya
Oversharing adalah tindakan pengungkapan informasi pribadi secara berlebihan atau tidak pantas tentang diri sendiri atau orang lain di platform publik, terutama media sosial, yang seharusnya hanya dibagikan di lingkungan yang lebih pribadi atau dalam hubungan yang sudah intim. Ini berarti berbicara lebih banyak dari yang seharusnya, seringkali melewati batas dengan terlalu terbuka terlalu cepat dengan orang lain. Fenomena ini sangat lazim di kalangan Generasi Z.

Mengapa Kita Sering Oversharing?
•	Cari Validasi dan Perhatian: Faktor utama yang mendorong perilaku ini adalah kebutuhan untuk mencari validasi dan pengakuan sosial dari teman sebaya melalui like, komentar, dan jumlah pengikut.
•	FOMO (Fear of Missing Out): Keinginan untuk memiliki kehadiran digital yang kuat dan takut ketinggalan.
•	Kebebasan Berekspresi: Media sosial menyediakan ruang yang nyaman dan bebas bagi individu untuk mengekspresikan diri.
•	Melepas Emosi: Beberapa individu menggunakan media sosial untuk menceritakan atau menyalurkan perasaan dan pikiran mereka, terutama ketika tidak ada tempat yang nyaman untuk mengeluh di offline.
•	Tidak Sengaja: Oversharing dapat terjadi secara tidak sengaja karena kurangnya kesadaran akan batasan privasi, kurangnya pengalaman dalam menangani informasi pribadi, atau kurangnya pemahaman tentang konteks atau audiens yang tepat untuk berbagi informasi.

Bahaya Oversharing:
•	Pelanggaran Privasi & Pencurian Data: Informasi yang diunggah sembarangan dapat digunakan oleh pihak yang tidak bertanggung jawab untuk tujuan seperti pencurian identitas atau penipuan online.
•	Cyberbullying & Penilaian Negatif: Pengungkapan diri yang berlebihan dapat membuat individu rentan terhadap cyberbullying, penghakiman, dan salah tafsir, yang mengarah pada konsekuensi sosial yang tidak diinginkan dan perubahan dalam hubungan pertemanan.
•	Masalah Kesehatan Mental: Oversharing dapat menyebabkan hasil psikologis yang merugikan, termasuk kecemasan dan harga diri yang rendah, karena individu bergulat dengan dampak pengungkapan online mereka.
•	Digital Footprint yang Permanen: Informasi yang dibagikan secara online meninggalkan "jejak digital" permanen yang sulit dihapus dan dapat memiliki dampak negatif jangka panjang.
•	Vulnerabilitas terhadap Disinformasi: Kemudahan berbagi informasi di media sosial juga dapat menyebabkan penyebaran informasi yang tidak valid atau disinformasi, yang memperburuk perpecahan dan konflik masyarakat.

Tantangan Level Up:
•	"Saring Sebelum Unggah": Sebelum posting, tanyakan: "Apakah ini perlu semua orang tahu? Bagaimana jika orang yang tidak saya kenal melihatnya? Apakah saya akan menyesalinya di masa depan?"
•	"Atur Privasi Sekarang!": Luangkan waktu untuk memeriksa dan menyesuaikan pengaturan privasi di semua akun media sosialmu. Siapa yang bisa melihat postinganmu? Siapa yang bisa mengomentari?',
            ],
            [
                'title' => 'AI itu Pintar, Tapi Kamu Harus Lebih Bijak',
                'topik' => 'Literasi AI dan Etika Teknologi',
                'content' => 'Jadilah Ahli AI yang Beretika!
Di era kecerdasan buatan (AI) ini, kita bukan cuma pengguna, tapi juga harus jadi warga negara digital yang cerdas dan beretika. AI bisa sangat membantu, tapi juga punya tantangan yang perlu kita pahami.

Apa Itu Literasi AI?
Literasi AI adalah seperangkat kompetensi yang memungkinkan individu untuk memahami, berinteraksi, dan mengevaluasi teknologi AI secara kritis, serta menggunakannya secara etis dan efisien. Ini bukan hanya tentang mengetahui cara menggunakan alat AI, tetapi juga memahami cara kerjanya, potensi dampaknya, dan bagaimana menjadi pengguna yang bertanggung jawab.

Pilar Literasi AI:
•	Pengetahuan dan Pemahaman Dasar AI: Memahami konsep dasar dan fungsionalitas AI.
•	Penggunaan dan Penerapan AI: Mampu menggunakan dan menerapkan aplikasi AI dalam berbagai konteks. Ini termasuk kemampuan untuk memberi
prompt alat AI secara akurat, memilih dan menerapkan fungsi AI yang sesuai, dan terampil menggunakan alat AI untuk memecahkan masalah praktis.
•	Evaluasi dan Kreasi AI: Kemampuan untuk mengevaluasi secara kritis dan bahkan menciptakan alat AI. Ini mencakup kemampuan untuk mengenali kekuatan dan kelemahan output AI (misalnya, gaya yang baik tetapi akurasi fakta yang kurang pada ChatGPT). Hal ini juga melibatkan demonstrasi kreativitas dalam menggunakan AI dan mengintegrasikan berbagai alat untuk memenuhi kebutuhan spesifik.
•	Kesadaran Etis dan Tanggung Jawab Sosial: Menjadi pengguna yang etis dan bertanggung jawab secara sosial. Ini melibatkan pemahaman tentang batasan AI, pertimbangan etis, dan prinsip-prinsip dasar teknologi.

Kenapa Literasi AI Penting Buat Kamu?
•	Peningkatan Kinerja Akademik dan Profesional: Literasi AI secara signifikan dan positif memprediksi kinerja menulis, dengan siswa yang memiliki literasi AI tinggi merasa lebih mampu menyusun bahasa yang tepat dan menghasilkan konten yang relevan.
•	Peningkatan Kesejahteraan Digital: Literasi AI menunjukkan hubungan positif dengan kesejahteraan yang didorong oleh AI generatif (GAI-driven well-being). Siswa yang mahir menggunakan alat AI tidak hanya mendapat manfaat dari kualitas tulisan yang lebih baik dan berkurangnya kecemasan menulis, tetapi juga cenderung merasakan kendali yang lebih kuat atas proses pembelajaran.
•	Mengembangkan Keterampilan Kognitif Tingkat Tinggi: Literasi AI dapat mempromosikan pemikiran kritis, pemecahan masalah di dunia nyata, kolaborasi, dan kreativitas.
•	Kesiapan Karir: Memahami berbagai aplikasi AI di berbagai bidang dapat memungkinkan eksplorasi jalur karir dan persiapan untuk pekerjaan di masa depan yang terkait dengan AI.
•	Pengambilan Keputusan yang Lebih Baik: Literasi AI memberdayakan individu untuk mengevaluasi secara kritis dan berkomunikasi secara efektif dengan teknologi, memungkinkan mereka menjadi warga digital yang berpendidikan.

Etika Teknologi: Menggunakan AI dengan Bijak
Meskipun terobosan dalam teknologi AI generatif (GAI) dapat meningkatkan kualitas dan efisiensi tulisan, serta menawarkan dukungan emosional dan kognitif, namun juga membawa tantangan etika yang signifikan.
Waspada Terhadap Risiko AI:
•	"Halusinasi" AI (Factual Hallucinations): GAI dapat menghasilkan informasi yang secara dangkal masuk akal tetapi secara faktual tidak benar. Ini dapat menyebabkan peningkatan beban kognitif karena kebutuhan untuk verifikasi ekstensif.
•	Plagiarisme & Ketergantungan Berlebihan: Penggunaan saran yang dihasilkan AI secara tidak kritis dapat meningkatkan kemungkinan plagiarisme (disengaja maupun tidak disengaja) serta ketergantungan pasif pada input AI.
•	Dampak pada Keterampilan Kognitif: Penyederhanaan pencarian informasi dan pembuatan jawaban oleh GAI secara tidak sengaja dapat merusak kemampuan berpikir kritis dan pemecahan masalah siswa dalam jangka panjang.
•	Privasi Data dan Keamanan: Sistem GAI biasanya memerlukan akses ke volume besar data siswa, termasuk catatan akademik dan informasi pribadi, yang menimbulkan risiko penyalahgunaan atau pelanggaran privasi.
•	Isolasi Sosial dan Kesepian: Ketergantungan berlebihan pada GAI dapat mengurangi frekuensi interaksi tatap muka, yang berpotensi menyebabkan isolasi sosial dan peningkatan perasaan kesepian.
•	Technostress (Kecemasan Teknologi): Siswa dapat mengalami peningkatan tingkat kecemasan teknologi karena ketergantungan mereka pada alat GAI, terutama jika mereka kekurangan pelatihan atau kompetensi terkait AI yang memadai.
•	Bias AI: AI dapat memperkuat bias yang ada dalam data, yang mengarah pada keputusan atau hasil yang tidak adil atau diskriminatif.

Jadilah Pengguna AI yang Beretika:
•	Verifikasi Informasi: Selalu cek ulang fakta yang diberikan AI.
•	Gunakan AI sebagai Alat Bantu, Bukan Pengganti: Manfaatkan AI untuk brainstorming, editing, atau mencari inspirasi, tapi proses berpikir dan analisis tetap dari kamu.
•	Lindungi Privasi: Pahami kebijakan privasi aplikasi AI yang kamu gunakan.
•	Pahami Batasan AI: Sadari bahwa AI tidak sempurna dan memiliki keterbatasan, terutama dalam pemahaman konteks atau emosi manusia.
•	Belajar Kontinu: Dunia AI terus berkembang. Tetaplah belajar dan beradaptasi dengan perkembangan terbaru.',
            ],
            [
                'title' => 'Digital Resilience: Tetap Waras di Dunia Maya',
                'topik' => 'Emotional Regulation & Mental Health Online',
                'content' => 'Setelah menjelajahi dunia digital yang kompleks, saatnya kita belajar bagaimana menyeimbangkan hidup online dan offline kita. Regulasi emosional adalah kunci untuk ini.

Kekuatan Mindfulness dalam Penggunaan Smartphone
Mindfulness (perhatian penuh) melibatkan sikap terbuka, penuh perhatian, dan sadar akan momen saat ini. Ini berfungsi sebagai strategi regulasi emosional dan telah terbukti memiliki hubungan terbalik dengan tingkat keparahan penggunaan smartphone bermasalah/problematic smartphone use (PSU).
Bagaimana Mindfulness Membantumu?
•	Mengurangi Kecemasan: Mindfulness memediasi hubungan antara kecemasan dan tingkat keparahan PSU. Peningkatan mindfulness dapat berfungsi sebagai buffer terhadap dampak gejala kecemasan pada tingkat keparahan PSU.
•	Regulasi Emosi Adaptif: Mindfulness dipahami sebagai pengaturan emosi melalui keterlibatan dengan, daripada penekanan atau penghindaran, pengalaman emosional. Ini dapat mengurangi PSU dengan menyediakan strategi adaptif untuk meregulasi emosi negatif.
•	Mengurangi Kebiasaan Otomatis: Mindfulness berkurang ketika individu terlibat dalam perilaku otomatis atau kebiasaan, seperti memeriksa ponsel. Oleh karena itu,
mindfulness dapat membantu mengurangi perilaku smartphone yang tidak terkontrol.
•	Intervensi Terapis: Intervensi berbasis mindfulness dapat mengurangi gejala kecemasan dan depresi, dan mungkin bermanfaat dalam mengobati kecanduan perilaku.

Mengatasi Toksisitas di Media Sosial dengan Regulasi Emosional
Anonimitas di platform media sosial membuat pengguna tersembunyi di balik keyboard, membebaskan mereka dari tanggung jawab dan memungkinkan mereka terlibat dalam kemarahan online, ujaran kebencian, dan toksisitas berbasis teks lainnya yang merugikan kesejahteraan online. Ini adalah hasil dari regulasi emosional yang tidak efektif.

Tantangan Level Up:
•	"Jeda 5 Detik": Sebelum membalas komentar online yang memicu emosi negatif (marah, jengkel), ambil jeda 5 detik. Tarik napas, hembuskan. Tanyakan: "Apakah balasan ini akan membangun atau justru memperburuk?"
•	"Digital Mindfulness Moment": Saat kamu merasa bosan atau cemas dan langsung meraih smartphone, berhenti sejenak. Sadari keinginan itu, lalu pilih untuk melakukan sesuatu yang berbeda (misalnya, minum air, melihat ke luar jendela, berbicara dengan orang di sekitar).
•	"Zona Aman Komentar": Identifikasi topik atau grup online mana yang sering memicu emosi negatifmu. Pertimbangkan untuk mengurangi interaksi di sana atau menonaktifkan notifikasi untuk sementara.',
            ],
        ];

        foreach ($data as $item) {
            Psychoeducation::create([
                'title'     => $item['title'],
                'topik'     => $item['topik'],
                'image'     => 'assets/images/seeder/psychoeducation.png', // <-- path gambar default
                'link_yt'   => null,
                'content'   => $item['content']
            ]);
        }
    }
}
